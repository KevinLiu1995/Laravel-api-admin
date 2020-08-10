<?php

use Illuminate\Database\Seeder;

class AdminPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_permissions')->delete();
        
        \DB::table('admin_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '所有权限（All）',
                'slug' => '*',
                'http_method' => '',
                'http_path' => '*',
                'created_at' => NULL,
                'updated_at' => '2020-07-31 09:43:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '首页',
                'slug' => 'dashboard',
                'http_method' => 'GET',
                'http_path' => '/',
                'created_at' => NULL,
                'updated_at' => '2020-07-31 09:43:58',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '登录',
                'slug' => 'auth.login',
                'http_method' => '',
                'http_path' => '/auth/login
/auth/logout',
                'created_at' => NULL,
                'updated_at' => '2020-07-31 09:44:05',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '管理员管理',
                'slug' => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path' => '/auth/setting
/auth/users*',
                'created_at' => NULL,
                'updated_at' => '2020-08-10 13:40:05',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '权限管理',
                'slug' => 'auth.management',
                'http_method' => '',
                'http_path' => '/auth/roles*
/auth/permissions*
/auth/menu*
/auth/logs*',
                'created_at' => NULL,
                'updated_at' => '2020-07-31 10:05:12',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '日志',
                'slug' => 'ext.log-viewer',
                'http_method' => '',
                'http_path' => '/logs*',
                'created_at' => '2020-06-13 09:17:41',
                'updated_at' => '2020-07-31 09:44:38',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'PHP info',
                'slug' => 'ext.php-info',
                'http_method' => 'GET',
                'http_path' => '/phpinfo',
                'created_at' => '2020-06-13 10:15:06',
                'updated_at' => '2020-06-13 10:15:47',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'ComposerViewer',
                'slug' => 'ext.compoer-viewer',
                'http_method' => 'GET',
                'http_path' => '/composer-viewer',
                'created_at' => '2020-06-13 10:27:09',
                'updated_at' => '2020-06-13 10:27:09',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'EnvManager',
                'slug' => 'ext.env-manager',
                'http_method' => 'GET',
                'http_path' => '/env-manager',
                'created_at' => '2020-06-13 10:27:43',
                'updated_at' => '2020-06-13 10:27:43',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Media manager',
                'slug' => 'ext.media-manager',
                'http_method' => '',
                'http_path' => '/media*',
                'created_at' => '2020-06-13 12:20:21',
                'updated_at' => '2020-06-13 12:20:21',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Admin helpers',
                'slug' => 'ext.helpers',
                'http_method' => '',
                'http_path' => '/helpers/*',
                'created_at' => '2020-06-13 12:33:14',
                'updated_at' => '2020-06-13 12:33:14',
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'Scheduling',
                'slug' => 'ext.scheduling',
                'http_method' => '',
                'http_path' => '/scheduling*',
                'created_at' => '2020-06-13 13:42:09',
                'updated_at' => '2020-06-13 13:42:09',
            ),
        ));
        
        
    }
}