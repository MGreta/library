<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_reservations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('book_id')->nullable()->unsigned();
            $table->string('comment')->nullable();
            $table->date('reservation_start_day');
            $table->date('reservation_end_day');
            $table->integer('is_ready')->default('0');
            $table->integer('is_active')->default('1');
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
        Schema::drop('book_reservations');
    }
}
