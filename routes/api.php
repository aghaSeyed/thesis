<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace'=>'api'], function () {

//    ,'middleware'=>'auth:api'
    Route::group(['prefix' => 'user'], function () {
//        Route::group(['namespace' => 'User'], function (){
//            Route::post('register' , 'LoginController@register');
        Route::post('login', 'LoginController@login');
        Route::match(['options', 'post'],'/record', 'RecordDataController@record')->middleware('cors');
        Route::get('getAll', 'RecordDataController@getAll')->middleware('cors');
    });

});
