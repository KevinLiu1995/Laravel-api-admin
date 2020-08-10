<?php

use Illuminate\Database\Seeder;

class AdminRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_roles')->delete();
        
        \DB::table('admin_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Root',
                'slug' => 'root',
                'created_at' => '2020-06-10 15:06:43',
                'updated_at' => '2020-08-10 11:14:57',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '管理员',
                'slug' => 'Admin',
                'created_at' => '2020-07-31 09:43:05',
                'updated_at' => '2020-07-31 09:43:05',
            ),
        ));
        
        
    }
}