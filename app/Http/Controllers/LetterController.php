<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Letter;
use App\User;
use Emojione\Client;
use Emojione\Ruleset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        \Redis::del('usermsg'.Auth::user()->id);
//        die;
//        dd($request->getClientIp());
        $to = User::find($request->get('to'));
        $ids = array($to,Auth::user()->id);
        $letters = Letter::whereIn('from',$ids)->orwhereIn('to',$ids)->orderby('created_at', 'desc')->paginate(10);

        $client = new Client(new Ruleset());
        $client->imagePathPNG = '/img/emoji/';
        return view('letters.index',compact('to'),compact('letters'))->with('client',$client);
    }

    public function send(Request $request){
        $input = $request->all();
        Letter::create($input);
        Helper::set_msg($input['to'], 2);
        return response()->json([
            'success' => true,
            'message' => '发送成功'
        ]);
    }



}
