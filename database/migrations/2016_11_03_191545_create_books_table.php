<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('title');
            $table->string('isbn')->unique()->nullable();
            $table->string('date')->nullable();
            $table->integer('size')->nullable();
            $table->integer('language')->nullable()->unsigned();
            $table->integer('type')->unsigned();
            $table->integer('publishing_house')->nullable()->unsigned();
            $table->integer('genre')->nullable()->unsigned();
            $table->integer('city')->nullable()->unsigned();
            $table->string('udk')->nullable();
            $table->integer('quantity')->default(1);
            $table->text('about')->nullable();
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
        Schema::drop('books');
    }
}
