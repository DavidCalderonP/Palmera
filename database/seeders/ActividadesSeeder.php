<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadesSeeder extends Seeder
{
    public function run()
    {
        DB::table('Actividades')->insert([
            'nombre_actividad' => 'Arar',
            'descripcion' => 'Se Ara',
            'costo' => "500.00",
            'tipo_actividad' => 0,
            'estatus' => 1
        ]);
        DB::table('Actividades')->insert([
            'nombre_actividad' => 'Cosechar',
            'descripcion' => 'Se Cosecha',
            'costo' => "500.00",
            'tipo_actividad' => 0,
            'estatus' => 1
        ]);
        DB::table('Actividades')->insert([
            'nombre_actividad' => 'Fumigar',
            'descripcion' => 'Se Fumiga',
            'costo' => "500.00",
            'tipo_actividad' => 0,
            'estatus' => 1
        ]);
    }
}
