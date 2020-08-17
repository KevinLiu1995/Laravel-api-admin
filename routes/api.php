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
Route::prefix('v1')->name('api.v1.')->namespace('Api\Index')->group(function () {
    // 短信验证码
    Route::post('/sms/code', 'SmsController@store')->name('sms.code');
    //回退路由
    Route::fallback('IndexController@fallBack');
});



