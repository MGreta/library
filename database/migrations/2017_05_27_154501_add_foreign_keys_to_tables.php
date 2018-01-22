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
            $table->foreign('language')->references('id')->on('languages')->onDelete('set null');
            $table->foreign('type')->references('id')->on('types')->onDelete('set null');
            $table->foreign('publishing_house')->references('id')->on('publishing_houses')->onDelete('set null');
            $table->foreign('genre')->references('id')->on('genres')->onDelete('set null');
            $table->foreign('city')->references('id')->on('cities')->onDelete('set null');
        });

        Schema::table('book_reservations', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('set null');
        });

        Schema::table('taken_books', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('worker_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('set null');
        });

        Schema::table('comments', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('set null');
        });

        Schema::table('book_ratings', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('set null');
        });

        Schema::table('role_user', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });

        Schema::table('books_udk_codes', function(Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books')->onDelete('set null');
        });

        Schema::table('book_authors', function(Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books')->onDelete('set null');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('set null');
        });

        Schema::table('udk_second_level', function(Blueprint $table) {
            $table->foreign('id_first_level')->references('id')->on('udk_first_level')->onDelete('set null');
        });
        Schema::table('udk_third_level', function(Blueprint $table) {
            $table->foreign('id_first_level')->references('id')->on('udk_first_level')->onDelete('set null');
            $table->foreign('id_second_level')->references('id')->on('udk_second_level')->onDelete('set null');
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
