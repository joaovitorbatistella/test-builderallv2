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
            'name' => 'Tapera',
        ]);
        DB::table('cities')->insert([
            'name' => 'Espumoso'
        ]);
        DB::table('cities')->insert([
            'name' => 'Selbach'
        ]);
        DB::table('cities')->insert([
            'name' => 'Lagoa dos Três Cantos'
        ]);
        DB::table('cities')->insert([
            'name' => 'Ibirubá'
        ]);
        DB::table('cities')->insert([
            'name' => 'Carazinho'
        ]);
        DB::table('cities')->insert([
            'name' => 'Passo Fundo'
        ]);
        DB::table('cities')->insert([
            'name' => 'Cruz Alta'
        ]);
        DB::table('cities')->insert([
            'name' => 'Porto Alegre'
        ]);
    }
}
