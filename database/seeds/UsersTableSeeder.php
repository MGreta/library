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
        	'name' => 'User',
        	'last_name' => 'User last',
        	'email' => 'user@user.com',
        	'password' => bcrypt('user'),
        	]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'last_name' => 'Admin last',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
            ]);            
    }
}
