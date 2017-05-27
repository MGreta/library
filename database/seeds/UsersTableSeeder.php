<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'last_name' => 'Admin last',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')        	
        	]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'User',
            'last_name' => 'User last',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
            ]);  

        DB::table('roles')->insert([
            [
                'id' => 1,
                'slug' => 'admin',
                'name' => 'Administrator',
            ],[
                'id' => 2,
                'slug' => 'user',
                'name' => 'User',
            ],
        ]);
        DB::table('role_user')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'role_id' => 1,
            ],[
                'id' => 2,
                'user_id' => 2,
                'role_id' => 2,
            ],
        ]);          
    }
}
