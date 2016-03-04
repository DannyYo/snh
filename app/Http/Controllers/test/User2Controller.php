<?php

namespace App\Http\Controllers;

use App\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Validator;
class User2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //注册
//        $user = new User;
//        $user->account = 'admin';
//        $user->password = 'admin';
//        $user->registime = Carbon::now();
//        $user->lock = 0;
//        $user->save();
        //更新
//        $user = User::find(1);
//        $user->registime = Carbon::now();
//        $user->save();
//          $user = new User;
//          $data = array('registime'=>Carbon::now());
//          $user->update($data);
        //查
        $users = User::latest()->registed()->get();
            //User::where('registime','<=',Carbon::now())->latest()->get();//latest()->get();
//        return view('articles.index')->with('users',$users);
        return view('users.index',compact('users'));
        //debug
//        dd($user);
        echo "finish";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create1');
        //
        $types =Type::lists('name', 'id');
//        dd($types);  die;
        //为了在界面中显示标签name，id为了在保存文章的时候使用。
        return view('users.create',compact('types'));
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
//        return $input;
//        $input['intro'] = mb_substr(Request::get('content'),0,64);
//        $input['registime'] = Carbon::now();//  模型可写字段要增加
//        var_dump( $input);die;

        $messages = [
            'same'    => ' :attribute  和:other 必须一致',
            'size'    => 'The :attribute must be exactly :size.',
            'between' => 'The :attribute must be between :min - :max.',
            'in'      => 'The :attribute must be one of the following types: :values',
        ];

        $validator = Validator::make($request->all(), [
            'account' => 'required|min:3',
            'password' => 'required|min:6',
//            'password_confirmation' => 'required|same:password',
//            'email' => 'required|email',
        ] , $messages);



        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create($input);
        $user->types()->attach($request->input('type_list'));
        return redirect('/');
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
//        $user = User::find($id);
//        if(is_null($user)){
//            abort(404); //APP_DEBUG=false可以把错误信息去掉
//        }
//        return $user; //view('users.show',compact('user'));
        return view('users.show')->with('user', User::findOrFail($id));
         return User::findOrFail($id);
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
        $user = User::findOrFail($id);
        $types = Type::lists('name', 'id');
        return view('users.edit',compact('user','types'));
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
        $user = User::find($request->get('id'));
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


}
