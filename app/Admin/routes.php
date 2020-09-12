<?php

use App\Admin\Controllers\AdministratorController;
use App\Admin\Controllers\UserController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    /*
    |--------------------------------------------------------------------------
    | 普通路由
    |--------------------------------------------------------------------------
    */
    Route::group([
        'namespace' => config('admin.route.namespace')
    ],function (Router $router){
        $router->get('/', 'HomeController@index')->name('home');
    });

    /*
     |--------------------------------------------------------------------------
     | 资源路由
     |--------------------------------------------------------------------------
     */
    // 管理员管理
    $router->resource('auth/users', AdministratorController::class)->names('admin.auth.users');
    // 用户管理
    $router->resource('users', UserController::class);
});

