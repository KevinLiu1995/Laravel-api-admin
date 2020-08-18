<?php

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_menu')->delete();
        
        \DB::table('admin_menu')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => '首页',
                'icon' => 'fa-bar-chart',
                'uri' => '/',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-07-29 10:04:09',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 2,
                'title' => '系统管理',
                'icon' => 'fa-tasks',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-07-29 10:04:18',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'order' => 3,
                'title' => '管理员',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-07-29 10:05:05',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 4,
                'title' => '角色',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-07-29 10:05:14',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'order' => 5,
                'title' => '权限',
                'icon' => 'fa-ban',
                'uri' => 'auth/permissions',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-07-29 10:05:20',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 6,
                'title' => '菜单',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-07-29 10:05:27',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 2,
                'order' => 7,
                'title' => '操作日志',
                'icon' => 'fa-history',
                'uri' => 'auth/logs',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-07-29 10:05:35',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 0,
                'order' => 8,
                'title' => 'Log viewer',
                'icon' => 'fa-database',
                'uri' => 'logs',
                'permission' => NULL,
                'created_at' => '2020-06-13 09:17:41',
                'updated_at' => '2020-07-29 10:04:57',
            ),
            8 => 
            array (
                'id' => 10,
                'parent_id' => 0,
                'order' => 10,
                'title' => 'ComposerViewer',
                'icon' => 'fa-gears',
                'uri' => 'composer-viewer',
                'permission' => 'ext.compoer-viewer',
                'created_at' => '2020-06-13 09:34:03',
                'updated_at' => '2020-06-13 10:52:51',
            ),
            9 => 
            array (
                'id' => 11,
                'parent_id' => 0,
                'order' => 11,
                'title' => 'EnvManager',
                'icon' => 'fa-gears',
                'uri' => 'env-manager',
                'permission' => 'ext.env-manager',
                'created_at' => '2020-06-13 09:59:59',
                'updated_at' => '2020-06-13 10:52:58',
            ),
            10 => 
            array (
                'id' => 12,
                'parent_id' => 0,
                'order' => 12,
                'title' => 'Media manager',
                'icon' => 'fa-file',
                'uri' => 'media',
                'permission' => NULL,
                'created_at' => '2020-06-13 12:20:21',
                'updated_at' => '2020-06-13 12:20:21',
            ),
            11 => 
            array (
                'id' => 13,
                'parent_id' => 0,
                'order' => 12,
                'title' => 'Helpers',
                'icon' => 'fa-gears',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2020-06-13 12:33:14',
                'updated_at' => '2020-07-31 09:57:42',
            ),
            12 => 
            array (
                'id' => 14,
                'parent_id' => 13,
                'order' => 13,
                'title' => 'Scaffold',
                'icon' => 'fa-keyboard-o',
                'uri' => 'helpers/scaffold',
                'permission' => NULL,
                'created_at' => '2020-06-13 12:33:14',
                'updated_at' => '2020-06-13 12:33:14',
            ),
            13 => 
            array (
                'id' => 15,
                'parent_id' => 13,
                'order' => 14,
                'title' => 'Database terminal',
                'icon' => 'fa-database',
                'uri' => 'helpers/terminal/database',
                'permission' => NULL,
                'created_at' => '2020-06-13 12:33:14',
                'updated_at' => '2020-06-13 12:33:14',
            ),
            14 => 
            array (
                'id' => 16,
                'parent_id' => 13,
                'order' => 15,
                'title' => 'Laravel artisan',
                'icon' => 'fa-terminal',
                'uri' => 'helpers/terminal/artisan',
                'permission' => NULL,
                'created_at' => '2020-06-13 12:33:14',
                'updated_at' => '2020-06-13 12:33:14',
            ),
            15 => 
            array (
                'id' => 17,
                'parent_id' => 13,
                'order' => 16,
                'title' => 'Routes',
                'icon' => 'fa-list-alt',
                'uri' => 'helpers/routes',
                'permission' => NULL,
                'created_at' => '2020-06-13 12:33:14',
                'updated_at' => '2020-06-13 12:33:14',
            ),
            16 => 
            array (
                'id' => 19,
                'parent_id' => 0,
                'order' => 18,
                'title' => 'Scheduling',
                'icon' => 'fa-clock-o',
                'uri' => 'scheduling',
                'permission' => NULL,
                'created_at' => '2020-06-13 13:42:09',
                'updated_at' => '2020-06-13 13:42:09',
            ),
        ));
        
        
    }
}