<?php

namespace App\Http\Controllers\Auth;

use App\Profile;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/profile';//跳转地址
    protected $redirectTo = '/profile';

    protected $username = 'name'; //用户名登录

    /**
     * Create a new authentication controller instance.
     *
     * return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
         $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $profile['username'] = '比克大魔王';
        $profile['user_id'] = $user['id'];
        $profile['sex'] = 0;
        $profile['intro'] = '此人很二，没有啥好写的';
        $profile['style'] = 'default';
        $profile['avatar'] = 'img/nameless.png';
        $profile['location'] = '宇宙 那美克星';
        Profile::create($profile);

        return $user;
    }


}
