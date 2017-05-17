<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('udk_third_level')->insert([
            [
            	'name' => 'debt_price',
            	'value' => '0'
            ],[
                'name' => 'days_to_have_book',
            	'value' => '30'
            ]
            ]);
    }
}
