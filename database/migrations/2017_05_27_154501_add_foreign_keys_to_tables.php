<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function(Blueprint $table) {
            $table->foreign('language')->references('id')->on('languages');
            $table->foreign('type')->references('id')->on('types');
            $table->foreign('publishing_house')->references('id')->on('publishing_houses');
            $table->foreign('genre')->references('id')->on('genres');
            $table->foreign('city')->references('id')->on('cities');
        });

        Schema::table('book_reservations', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('taken_books', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('worker_id')->references('id')->on('users');
            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('comments', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('book_ratings', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('role_user', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::table('books_udk_codes', function(Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::table('book_authors', function(Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('author_id')->references('id')->on('authors');
        });

        Schema::table('udk_second_level', function(Blueprint $table) {
            $table->foreign('id_first_level')->references('id')->on('udk_first_level');
        });
        Schema::table('udk_third_level', function(Blueprint $table) {
            $table->foreign('id_first_level')->references('id')->on('udk_first_level');
            $table->foreign('id_second_level')->references('id')->on('udk_second_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
