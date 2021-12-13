<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContenedorCosechaSeeder extends Seeder
{
    public function run()
    {
        DB::table('ContenedoresXCosecha')->insert([
            'id_contenedor' => 1,
            'id_cosecha' => 1,
            'cantidad_ingreso' => 500,
            'cantidad_vendida' => 0,
            'fecha_ingreso' => '2021-12-12',
        ]);
        DB::table('ContenedoresXCosecha')->insert([
            'id_contenedor' => 2,
            'id_cosecha' => 2,
            'cantidad_ingreso' => 500,
            'cantidad_vendida' => 0,
            'fecha_ingreso' => '2021-12-12',
        ]);
        DB::table('ContenedoresXCosecha')->insert([
            'id_contenedor' => 3,
            'id_cosecha' => 3,
            'cantidad_ingreso' => 500,
            'cantidad_vendida' => 0,
            'fecha_ingreso' => '2021-12-12',
        ]);
        DB::table('ContenedoresXCosecha')->insert([
            'id_contenedor' => 4,
            'id_cosecha' => 4,
            'cantidad_ingreso' => 500,
            'cantidad_vendida' => 0,
            'fecha_ingreso' => '2021-12-12',
        ]);
        DB::table('ContenedoresXCosecha')->insert([
            'id_contenedor' => 5,
            'id_cosecha' => 5,
            'cantidad_ingreso' => 500,
            'cantidad_vendida' => 0,
            'fecha_ingreso' => '2021-12-12',
        ]);
        DB::table('ContenedoresXCosecha')->insert([
            'id_contenedor' => 6,
            'id_cosecha' => 6,
            'cantidad_ingreso' => 500,
            'cantidad_vendida' => 0,
            'fecha_ingreso' => '2021-12-12',
        ]);
        DB::table('ContenedoresXCosecha')->insert([
            'id_contenedor' => 7,
            'id_cosecha' => 7,
            'cantidad_ingreso' => 500,
            'cantidad_vendida' => 0,
            'fecha_ingreso' => '2021-12-12',
        ]);
        DB::table('ContenedoresXCosecha')->insert([
            'id_contenedor' => 8,
            'id_cosecha' => 8,
            'cantidad_ingreso' => 500,
            'cantidad_vendida' => 0,
            'fecha_ingreso' => '2021-12-12',
        ]);
    }
}
