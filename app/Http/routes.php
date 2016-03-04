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
Route::get('/home','IndexController@index');
// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// 发送密码重置链接路由
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// 密码重置路由
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//个人信息
//Route::get('profile','ProfileController@index');//Route::get('home','IndexController@index'); //
//Route::post('profile/update','ProfileController@update');
//Route::get('profile/destroy/{id}/','ProfileController@destroy');
Route::resource('profile', 'ProfileController');
Route::get('profile/{id}','ProfileController@show');
//头像上传
Route::get('/avatar/upload','ProfileController@avatar');
Route::post('/avatar/upload','ProfileController@avatarUpload');
Route::post('/avatar/uploadCrop','ProfileController@uploadCrop');
//发布动态
//Route::resource('moment', 'MomentController');
Route::get('moment/create','MomentController@create');
Route::post('moment/store','MomentController@store');
Route::get('moment','MomentController@index');
Route::get('moment/{id}','MomentController@show');
Route::get('moments/hot','MomentController@hot');
Route::get('moments/relative','MomentController@relative');
//动态评论
Route::post('comment/store','CommentController@store');
//私信
Route::get('letter','LetterController@index');
Route::post('letter/send','LetterController@send');

Route::get('/','IndexController@index');
Route::get('test','TestController@index');
Route::get('users','UserController@index');
Route::get('users/create','UserController@create');
Route::post('users/store','UserController@store');
Route::get('users/chart','UserController@chart');
Route::get('users/getWeightData','UserController@getWeightData');
Route::get('users/addWeightData','UserController@addWeightData');
Route::get('users/report','UserController@report');
Route::get('users/hc','UserController@hc');
Route::get('users/likeOrNot','UserController@likeOrNot');
Route::get('users/keepOrNot','UserController@keepOrNot');
Route::get('users/follow','UserController@follow');

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
