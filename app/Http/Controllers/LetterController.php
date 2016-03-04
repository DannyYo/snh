<?php

namespace App\Http\Controllers;

use App\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Validator;
class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('letters.index');
    }

    public function send(){
        return response()->json([
            'success' => true,
            'message' => '发送成功'
        ]);
    }


}
