<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class citiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'city_name' => 'Tapera',
        ]);
        DB::table('cities')->insert([
            'city_name' => 'Espumoso'
        ]);
        DB::table('cities')->insert([
            'city_name' => 'Selbach'
        ]);
        DB::table('cities')->insert([
            'city_name' => 'Lagoa dos Três Cantos'
        ]);
        DB::table('cities')->insert([
            'city_name' => 'Ibirubá'
        ]);
        DB::table('cities')->insert([
            'city_name' => 'Carazinho'
        ]);
        DB::table('cities')->insert([
            'city_name' => 'Passo Fundo'
        ]);
        DB::table('cities')->insert([
            'city_name' => 'Cruz Alta'
        ]);
        DB::table('cities')->insert([
            'city_name' => 'Porto Alegre'
        ]);
    }
}
