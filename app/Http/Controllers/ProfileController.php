<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
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
        $user = $request->user();
        $profile = $user->profile?$user->profile:null;

        if(!empty($profile->location))
        {
            $loc = explode(' ',$profile->location);
            $profile->province = $loc[0];
            $profile->city = $loc[1];
        }
        return view('profile.index',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DD($request);
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
        $user = User::find($id);
        $profile = $user->profile?$user->profile:null;
        $profile->follow= false;
        if(count(Follow::get()->where('user_id',Auth::user()->id)->where('follow_id',(int)$id)))
            $profile->follow= true;
        if(!empty($profile->location))
        {
            $loc = explode(' ',$profile->location);
            $profile->province = $loc[0];
            $profile->city = $loc[1];
        }
        return view('profile.index',compact('profile'));
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
        $profile = Profile::find($id);
        if(!empty($profile->location))
        {
            $loc = explode(' ',$profile->location);
            $profile->province = $loc[0];
            $profile->city = $loc[1];
        }
        return view('profile.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $profile = Profile::findOrFail($id);
        $input = $request->all();
        $input['location']=$input['province'].' '.$input['city'];
        $profile->update($input);
        if($profile){
            echo 'success';
            return redirect('profile')->with('message', '更新发布！');
        }else{
            return back()->withInput()->with('errors','保存失败！');
        }

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



    public function avatar()
    {
        return view('profile.avatar');
    }
    public function avatarUpload(Request $request)
    {
        $this->wrongTokenAjax($request);
        $file = Input::file('image');
        $input = array('image' => $file);
        $rules = [
            'image' => 'image'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        $destinationPath = 'uploads/'.$request->user()->id.'/';

        if(is_dir($destinationPath) || mkdir($destinationPath,0777,true) ){
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            return response()->json(
                [
                    'success' => true,
                    'avatar' => asset($destinationPath.$filename),
                ]
            );
        }else{
            return response()->json(
                [
                    'success' => false,
                    'errors' => '创建目录失败',
                ]
            );
        }
    }

    public function wrongTokenAjax($request)
    {
        if ( $request->session()->get('_token') !== $request->get('_token') ) {
            $response = [
                'status' => false,
                'errors' => 'Wrong Token',
            ];
            return response()->json($response);
        }
    }

    public function uploadCrop(Request $request)
    {
        $tarW = $request->get('tarW');
        $tarH = $request->get('tarH');
        $src = strstr($request->get('src'),'uploads');
        $img_r = imagecreatefromjpeg($src);
        $dst_r = ImageCreateTrueColor( $tarW, $tarH );
        imagecopyresampled($dst_r,$img_r,0,0,$request->get('x'),$request->get('y'),
            $tarW,$tarH,$request->get('w'),$request->get('h'));
        $avatar = 'uploads/'.$request->user()->id.'/avatar/'.rand(1000,9999).'.png';
        if(imagejpeg($dst_r,$avatar) ){
            $request->user()->profile->avatar = $avatar;
            $request->user()->profile->save();
            unlink($src);
            return response()->json([
                'success' => true,
                'message' => '上传成功'
            ]);
        }else
            return response()->json([
                'success' => false,
                'message' => '上传失败，请重新上传'
            ]);
    }

}
