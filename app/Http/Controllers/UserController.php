<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Keep;
use App\Moment;
use App\Like;
use App\Weight;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function profile(Request $request)
    {
        $user = $request->user();
        echo $user['name'].'登录成功！';
        echo '<a href="/auth/logout">Log in/out</a>';
        echo '<br>';
        echo '<a href="/password/email">forget password</a>';
    }

    public function chart()
    {
        return view('charts.index');
    }

    public function getWeightData()
    {
        $arr = [];
        $days = [];
        foreach(Auth::user()->weights()->orderby('created_at', 'desc')->take(6)->get() as $weight){
            $arr[] = $weight->weight;
            $days[] = $weight->created_at->format('l') == Carbon::now()->format('l') ? 'today': $weight->created_at->format('l');
        }

        return response()->json([
            'data' => $arr,
            'days' => $days
        ]);
    }
    public function addWeightData(Request $request)
    {
        $data = $request->get('data');
        if($request->get('type') == 'true'){
            Weight::create(array('weight'=>(int)$data, 'user_id'=>Auth::user()->id));
        }else{
            $weight = Auth::user()->weights()->orderby('created_at', 'desc')->first();
            $weight->update(array('weight'=> $data));
        }
        $msg = 'success';
        return response()->json($msg);
    }

    public function report()
    {
        return view('charts.report');
    }
    public function hc()
    {
        return view('charts.hc');
    }
    public function likeOrNot(Request $request)
    {
        $id =(int) $request->get('id');
        $type = $request->get('type');
        $moment = Moment::find($id);
        if($type == 'true') //true like false dislike
        {
            $result = $moment->likes->where('user_id',Auth::user()->id);
            if(count($result))
                return response()->json('failed');
             Like::create(array('user_id'=>Auth::user()->id,'moment_id'=>$id));
            $moment->update(array('like'=> ($moment->like+1)));
        }else{
            Like::get()->where('user_id',Auth::user()->id)->where('moment_id',$id)->first()->delete();
            $moment->update(array('like'=> ($moment->like-1)));
        }
        $msg = 'success';
        return response()->json($msg);
    }
    public function keepOrNot(Request $request)
    {
        $id =(int) $request->get('id');
        $type = $request->get('type');
        $moment = Moment::find($id);
        if($type == 'true') //true keep false not keep
        {
            $result = $moment->keeps->where('user_id',Auth::user()->id);
            if(count($result))
                return response()->json('failed');
            Keep::create(array('user_id'=>Auth::user()->id,'moment_id'=>$id));
            $moment->update(array('keep'=> ($moment->keep+1)));
        }else{
            Keep::get()->where('user_id',Auth::user()->id)->where('moment_id',$id)->first()->delete();
            $moment->update(array('keep'=> ($moment->keep-1)));
        }
        $msg = 'success';
        return response()->json($msg);
    }
    public function follow(Request $request)
    {
        $id =(int) $request->get('id');
        $type = $request->get('type');
        if($type == 'true') //true follow false not follow
        {
            Follow::create(array('user_id'=>Auth::user()->id,'follow_id'=>$id));
        }else{
            Follow::get()->where('user_id',Auth::user()->id)->where('follow_id',$id)->first()->delete();
        }
        $msg = 'success';
        return response()->json($msg);
    }
}