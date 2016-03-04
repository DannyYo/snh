<?php

namespace App\Http\Controllers;

use App\Moment;
use App\Picture;
use Emojione\Client;
use Emojione\Ruleset;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MomentController extends Controller
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
        $moments = $request->user()->moments()->with('comments.user', 'picture')->orderby('created_at', 'desc')->paginate(10);
        $client = new Client(new Ruleset());
        $client->imagePathPNG = '/img/emoji/';
        return view('moments.index',compact('moments'),compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client(new Ruleset());
        $client->imagePathPNG = '/img/emoji/';
        $aa = $client->shortnameToImage('Hello world! :smile:');
//        echo $aa;
        return view('moments.create',compact('aa'));
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
        ] , $messages);

        if ($validator->fails()) {
            return redirect('moment/create')
                ->withErrors($validator)
                ->withInput();
        }

        $moment = Moment::create($input);
        $picture['moment_id'] = $moment->id;

        if(empty($input['image']))
            return redirect('moment')->with('message', '更新发布！');

        $file = $request->file('image');
        $input = array('image' => $file);
        $rules = [
            'image' => 'image'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $moment->delete();
            return redirect('moment/create')
                ->withErrors($validator)
                ->withInput();
        }
        $destinationPath = 'uploads/'.$request->user()->id.'/moments/';

        if(is_dir($destinationPath) || mkdir($destinationPath,0777,true) ){
            $filename = rand(1000,9999).'.png';
            $request->file('image')->move($destinationPath, $filename);
            $picture['pic'] = $destinationPath.$filename;
            Picture::create($picture);
            return redirect('moment')->with('message', '更新发布！');
        }else{
            $moment->delete();
            return back()->withInput()->with('errors','创建目录失败！');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $moment = Moment::find($id);
        if(is_null($moment)){
            abort(404); //APP_DEBUG=false可以把错误信息去掉
        }
//        return $user; //view('moments.show',compact('user'));
        return view('moments.show')->with('moment',$moment);
//        return Moment::findOrFail($id);
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
}

