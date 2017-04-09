<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToTakenBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taken_books', function(Blueprint $table) {
            $table->integer('worker_id')->nullable();
            $table->integer('read')->nullable();
            $table->decimal('debt', 3, 1)->default('0.0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taken_books', function (Blueprint $table) {
            $table->dropColumn('worker_id');
            $table->dropColumn('read');
            $table->dropColumn('debt');
        });
    }
}
