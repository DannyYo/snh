<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('profile','ProfileController@index');//Route::get('home','IndexController@index'); //
// 发送密码重置链接路由
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// 密码重置路由
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::get('/','IndexController@index');
Route::get('test','TestController@index');
Route::get('users','UserController@index');
Route::get('users/create','UserController@create');
Route::post('users/store','UserController@store');



//Route::get('/', function () {
//    return view('welcome');
//});
    Route::get('users/{id}','UserController@show');
//Route::get('user/{name?}', function ($name = 'ano') {
//    return 'Hello '.$name;
//});
Route::get('user/edit/{id}','UserController@edit');
Route::post('user/update','UserController@update');
//Route::get('article/edit/{id}','ArticleController@edit')->where('id', '[0-9]+');
