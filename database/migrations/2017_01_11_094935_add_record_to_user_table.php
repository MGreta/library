<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecordToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            DB::table('users')->insert(
            ['name' => 'mokinys', 'last_name' => 'mokinys last', 'class' => '3d', 'email' => 'mokinys@mokinys.com', 'password' => bcrypt('mokinys'), 'role' => 'user']
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            DB::table('users')->where('email', "mokinys@mokinys.com")->delete();
        });
    }
}
