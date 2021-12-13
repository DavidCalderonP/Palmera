<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContenedoresSeeder extends Seeder
{
    public function run()
    {
        DB::table('Contenedores')->insert([
            'cantidad_maxima' => 1000,
            'cantidad_vendida' => 0,
            'cantidad_actual' => 500,
            'tipo_cosecha' => 0,
            'estatus' => 1,
        ]);
        DB::table('Contenedores')->insert([
            'cantidad_maxima' => 1000,
            'cantidad_vendida' => 0,
            'cantidad_actual' => 500,
            'tipo_cosecha' => 0,
            'estatus' => 1,
        ]);
        DB::table('Contenedores')->insert([
            'cantidad_maxima' => 1000,
            'cantidad_vendida' => 0,
            'cantidad_actual' => 500,
            'tipo_cosecha' => 0,
            'estatus' => 1,
        ]);
        DB::table('Contenedores')->insert([
            'cantidad_maxima' => 1000,
            'cantidad_vendida' => 0,
            'cantidad_actual' => 500,
            'tipo_cosecha' => 0,
            'estatus' => 1,
        ]);
        DB::table('Contenedores')->insert([
            'cantidad_maxima' => 1000,
            'cantidad_vendida' => 0,
            'cantidad_actual' => 500,
            'tipo_cosecha' => 1,
            'estatus' => 1,
        ]);
        DB::table('Contenedores')->insert([
            'cantidad_maxima' => 1000,
            'cantidad_vendida' => 0,
            'cantidad_actual' => 500,
            'tipo_cosecha' => 1,
            'estatus' => 1,
        ]);
        DB::table('Contenedores')->insert([
            'cantidad_maxima' => 1000,
            'cantidad_vendida' => 0,
            'cantidad_actual' => 500,
            'tipo_cosecha' => 1,
            'estatus' => 1,
        ]);
        DB::table('Contenedores')->insert([
            'cantidad_maxima' => 1000,
            'cantidad_vendida' => 0,
            'cantidad_actual' => 500,
            'tipo_cosecha' => 1,
            'estatus' => 1,
        ]);
    }
}
