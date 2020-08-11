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

//回退路由
Route::fallback(function () {
    return response()
        ->json(['msg' => '404 请检查访问地址或请求方式是否正确', 'code' => 404, 'data' => []])
        ->setStatusCode(404);
});
