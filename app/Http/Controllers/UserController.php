<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Follow;
use App\Helper;
use App\Keep;
use App\Letter;
use App\Moment;
use App\Like;
use App\UserActivity;
use App\Weight;
use Carbon\Carbon;
use Emojione\Client;
use Emojione\Ruleset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

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
            $days[] = $weight->created_at == Carbon::now() ? 'today': $weight->created_at->format('d M');
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
        $profile = Auth::user()->profile;
        return view('charts.report', compact('profile'));
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
    public function getMsg(Request $request)
    {
        $uid = Auth::user()->id;
        $redis = Redis::connection('default');
        $msg = json_decode($redis->get('usermsg'.$uid),true);
        if ($msg) {
            if ($msg['comment']['status']) {
                $msg['comment']['status'] = 0; //设置为已读
                $redis->set('usermsg'.$uid,json_encode($msg));
                return response()->json(array(
                    'status' => 1,
                    'total' => $msg['comment']['total'],
                    'type' => 1
                ));
            }

            if ($msg['letter']['status']) {
                $msg['letter']['status'] = 0;
                $redis->set('usermsg'.$uid,json_encode($msg));
                return response()->json(array(
                    'status' => 1,
                    'total' => $msg['letter']['total'],
                    'type' => 2
                ));
            }

            if ($msg['atme']['status']) {
                $msg['atme']['status'] = 0;
                $redis->set('usermsg'.$uid,json_encode($msg));
                return response()->json(array(
                    'status' => 1,
                    'total' => $msg['atme']['total'],
                    'type' => 3
                ));
            }
        }
        return response()->json(array('status' => 0));
    }

    public function getLetter(Request $request)
    {
        Helper::set_msg(Auth::user()->id, 2,true);
        $data = [];
        foreach(Auth::user()->to()->orderby('created_at', 'desc')->take($request->get('take'))->get() as $letter){
            $data[] = $letter->content;
        }
        return response()->json($data);
    }
    public function join(Request $request)
    {
        $id =(int) $request->get('id');
        $type = $request->get('type');
        if($type == 'true')
        {
            UserActivity::create(array('user_id'=>Auth::user()->id,'activity_id'=>$id));
        }else{
            UserActivity::get()->where('user_id',Auth::user()->id)->where('activity_id',$id)->first()->delete();
        }
        $msg = 'success';
        return response()->json($msg);
    }
    public function msgList1(Request $request)
    {
        $ids =array();
        foreach(Auth::user()->moments as $moment){
            $ids[]= $moment->id;
        }
        $msgs = Comment::whereIn('moment_id',$ids)->orderby('created_at', 'desc')->paginate(10);
        return view('profile.msgList1',compact('msgs'));
    }
    public function msgList2(Request $request)
    {
        $client = new Client(new Ruleset());
        $client->imagePathPNG = '/img/emoji/';
        $msgs = Letter::where('to',Auth::user()->id)->with('fromUser')->orderby('created_at', 'desc')->paginate(10);
        return view('profile.msgList2',compact('msgs'),compact('client'));
    }
    public function msgList3(Request $request)
    {
        $client = new Client(new Ruleset());
        $client->imagePathPNG = '/img/emoji/';
        $msgs = Moment::where('user_id',1)->orderby('created_at', 'desc')->paginate(10);
        return view('profile.msgList3',compact('msgs'),compact('client'));
    }
}