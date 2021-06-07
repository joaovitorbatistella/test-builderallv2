<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(citiesTableSeeder::class);
        $this->call(usersTableSeeder::class);
        $this->call(clientsTableSeeder::class);
    }
}
