<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->date('date')->nullable()->change();
            $table->integer('size')->nullable()->change();
            $table->integer('language')->nullable()->change();
            $table->integer('type')->nullable()->change();
            $table->string('udk')->nullable()->change();
            $table->integer('quantity')->nullable()->change();
            $table->text('about')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->date('date')->change();
            $table->integer('size')->change();
            $table->integer('language')->change();
            $table->integer('type')->change();
            $table->string('udk')->change();
            $table->integer('quantity')->change();
            $table->text('about')->change();
        });
    }
}
