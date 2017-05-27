<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTakenBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taken_books', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('book_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('start_day');
            $table->date('end_day');
            $table->integer('worker_id')->unsigned();
            $table->integer('read')->default('0');
            $table->integer('returned')->default('0');
            $table->integer('times_continued')->default('0');
            $table->timestamps();
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
