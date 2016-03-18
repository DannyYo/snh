<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Moment;
use App\Picture;
use App\User;
use App\UserActivity;
use Carbon\Carbon;
use Emojione\Client;
use Emojione\Ruleset;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $activities = Activity::orderby('created_at', 'desc')->paginate(10);
        return view('activities.index',compact('activities'));
    }
    public function attendedActivities(Request $request)
    {
        $activities = Auth::user()->attendedActivities()->orderby('created_at', 'desc')->paginate(10);
        return view('activities.index',compact('activities'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//Requests\StoreArticleRequest $request)
    {
        //
        $input = $request->all();
        $messages = [
            'min' => '发布内容必须大于 :min 个字',
            'required' => '发布内容不能为空'
        ];

        $validator = Validator::make($request->all(), [
            'content' => 'required|min:3',
            'title' => 'required',
            'loc' => 'required',
            'start' => 'required',
            'end' => 'required'
        ] , $messages);

        if ($validator->fails()) {
            return redirect('activity/create')
                ->withErrors($validator)
                ->withInput();
        }
        $activity = Activity::create($input);
        UserActivity::create(array('user_id'=>Auth::user()->id,'activity_id'=>$activity->id));
        return redirect('activity')->with('message', '更新发布！');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::where(array('id'=>$id))->with('attendees')->first();
        $activity->is_joined= false;
        $activity->status = '未开始';
        if($activity->start <= Carbon::now() && $activity->end >= Carbon::now()){
            $activity->status = '报名中';
        }
        if($activity->end < Carbon::now()){
            $activity->status = '已结束';
        }
        if(count(UserActivity::get()->where('user_id',Auth::user()->id)->where('activity_id',(int)$id)))
            $activity->is_joined= true;

        if(is_null($activity)){
            abort(404); //APP_DEBUG=false可以把错误信息去掉
        }
        return view('activities.show',compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = Moment::findOrFail($id);
        $types = Type::lists('name', 'id');
        return view('moments.edit',compact('user','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //TODO 有个bug提交后password会再次被MD5
//        dd($request->all());
        //根据id查询到需要更新的article
        $user = Moment::find($request->get('id'));
        //使用Eloquent的update()方法来更新，
        //request的except()是排除某个提交过来的数据，我们这里排除id
        $user->update($request->except('id'));
        // 跟attach()类似，我们这里使用sync()来同步我们的标签
        $user->types()->sync($request->get('type_list'));

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hot()
    {
        $moments = Moment::with('comments.user', 'picture')->orderby('like', 'desc')->paginate(10);;
        $client = new Client(new Ruleset());
        $client->imagePathPNG = '/img/emoji/';
        return view('moments.index',compact('moments'),compact('client'));
    }
    public function relative()
    {
        $ids =array();
        foreach(Auth::user()->follows as $follow){
        $ids[]= $follow->follow_id;
        }
        $moments = Moment::whereIn('user_id',$ids)->with('comments.user', 'picture')->orderby('created_at', 'desc')->paginate(10);;
        $client = new Client(new Ruleset());
        $client->imagePathPNG = '/img/emoji/';
        return view('moments.index',compact('moments'),compact('client'));
    }

    public function imgUpload(Request $request)
    {
        $file = Input::file('upload');
        $callback = $request->get("CKEditorFuncNum");
        $input = array('image' => $file);
        $rules = [
            'image' => 'image'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction(". $callback. ",'','出现问题:". $validator->getMessageBag()->toArray()."'); </script>";
            exit;
        }
        $destinationPath = 'uploads/'.$request->user()->id.'/';

        if(is_dir($destinationPath) || mkdir($destinationPath,0777,true) ){
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction(". $callback. ",'" . asset($destinationPath.$filename) . "',''); </script>";
            exit;
        }else{
            echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction(". $callback. ",'','文件上传失败，请检查上传目录设置和目录读写权限'); </script>";
            exit;
        }
    }
}

