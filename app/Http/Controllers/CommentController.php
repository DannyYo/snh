<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $moments = $request->user()->moments()->orderby('created_at', 'desc')->get();
        return view('moments.index',compact('moments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moments.create');
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
            'min' => '评论内容必须大于 :min 个字',
            'required' => '评论内容不能为空'
        ];

        $validator = Validator::make($request->all(), [
            'content' => 'required|min:3',
        ] , $messages);

        if ($validator->fails()) {
            return redirect('moment')
                ->withErrors($validator)
                ->withInput();
        }
        Comment::create($input);

        return redirect('moment');
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


}

