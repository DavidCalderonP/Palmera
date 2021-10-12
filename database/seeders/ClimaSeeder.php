<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClimaSeeder extends Seeder
{
    public function run()
    {
        DB::table('clima')->insert([
            'id' => 1,
            'nombre_clima' => 'Calido húmedo'
        ]);
        DB::table('clima')->insert([
            'id' => 2,
            'nombre_clima' => 'Calido subhúmedo'
        ]);
        DB::table('clima')->insert([
            'id' => 3,
            'nombre_clima' => 'Muy seco o seco desértico'
        ]);
        DB::table('clima')->insert([
            'id' => 4,
            'nombre_clima' => 'Seco o semiseco'
        ]);
        DB::table('clima')->insert([
            'id' => 5,
            'nombre_clima' => 'Templado húmedo'
        ]);
        DB::table('clima')->insert([
            'id' => 6,
            'nombre_clima' => 'Templado subhúmedo'
        ]);
    }
}
