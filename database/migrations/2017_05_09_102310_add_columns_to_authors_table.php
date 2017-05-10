<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authors', function(Blueprint $table) {
            $table->renameColumn('author_surname', 'country');
            $table->string('birth_date')->default('0');
            $table->string('death_date')->default('0');
            $table->string('image')->default('default.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->renameColumn('country', 'author_surname');
            $table->dropColumn('birth_date');
            $table->dropColumn('death_date');
        });
    }
}
