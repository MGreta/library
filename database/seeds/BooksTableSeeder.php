<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
        	'title' => 'The Name of the Wind',
        	'author' => 'Patrick Rothfuss',
        	'isbn' => '	978-0-7564-0407-9',
        	'date' => '2007-03-27',
        	'size' => '662',
        	'language' => '1',
        	'type' => '1',
        	'udk' => 'udk1',
        	'quantity' => '10',
        	'about' => 'about book',
        	]);
    }
}