<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(UDKfirstLevelSeeder::class);
        $this->call(UDKsecondLevelSeeder::class);
        $this->call(UDKthirdLevelSeeder::class);
    }
}
