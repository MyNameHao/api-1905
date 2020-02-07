<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/info',function(){
	phpinfo();
});
Route::get('/aliapi','Alipay@aliapi');
Route::get('/alipay/return','Alipay@return_url');
Route::post('/alipay/notify','Alipay@notify_url');
Route::post ('/test/reg','Test\UserController@reg');
Route::post ('/test/login','Test\UserController@login');
Route::get ('/test/index','Test\UserController@index')->middleware('RefreshRedis');
Route::get('/test/ascii','Test\TestController@ascii');
Route::get('/test/unascii','Test\TestController@unascii');
Route::get('/test/addpub','Test\User@addpub');
Route::post('/test/creapub','Test\User@creapub');
Route::get('/test/uppubkey/{id}','Test\User@uppubkey');
Route::get('/test/decode','Test\User@decode');
Route::post('/test/decode_do','Test\User@decode_do');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//验证签名
Route::get('/test/addsign','Test\TestController@addsign');
Route::post('/test/verify','Test\TestController@verify');


Route::post('/api/user/reg','Api\UserController@reg');
Route::post('/api/user/login','Api\UserController@login');
Route::post('/api/user/lists','Api\UserController@lists')->middleware('RefreshRedis');


//网页防刷
Route::get('/api/user/fangshua','Api\UserController@fangshua');
Route::get('/api/user/signature','Api\UserController@signature');
//postsing
Route::get('/api/user/postsign','Api\UserController@postsign');
//sslencr
Route::get('/api/user/sslencr','Api\UserController@sslencr');

