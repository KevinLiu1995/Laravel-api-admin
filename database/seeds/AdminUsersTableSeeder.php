<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_users')->delete();
        
        \DB::table('admin_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'root',
                'password' => '$2y$10$p9DxbVLz2rCRWP5Xhs.BQ.plctdqFYPhnhZxXQKDL9MyJPnPpBj6W',
                'name' => 'root',
                'avatar' => '../local/images/avatar.jpg',
                'remember_token' => 'P3nMIQHnNch1yDZkfQlaK2iGihUOrJ6qtpKX6fLiL5CSNkcxrUzz3mzqAgFT',
                'created_at' => '2020-06-10 15:06:43',
                'updated_at' => '2020-08-10 11:16:13',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'admin',
                'password' => '$2y$10$33OXR0o/6EQJSdaRFqHQDuNPnsUOoPnhZ4mVYe8bIJAzo.gprI.Mu',
                'name' => '管理员',
                'avatar' => '../local/images/avatar.jpg',
                'remember_token' => 'Ay3OWvmjnxqfrcvtW2V9Ic4SRVgav4nebvH6947D477o0VYbXc8VBpWnNJfj',
                'created_at' => '2020-06-13 10:18:11',
                'updated_at' => '2020-08-10 11:19:43',
            ),
        ));
        
        
    }
}