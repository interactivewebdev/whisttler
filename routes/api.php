<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('checkemail','UserController@checkEmail');
Route::post('postsignup','UserController@postSignup');
Route::post('checkcode','UserController@checkCode');
Route::post('checkphonecode','UserController@checkPhoneCode');
Route::post('enterpassword','UserController@postEnterpassword');
Route::post('enterdetails','UserController@postEnterdetails');
Route::post('category','UserController@postEnterCategory');
Route::post('sendphonecode','UserController@sendPhoneCode');
Route::post('setcategory', 'UserController@setCategory');

Route::get('test',function (){
   return "test";
});