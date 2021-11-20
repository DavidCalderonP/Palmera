<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDatilSeeder extends Seeder
{
    public function run()
    {
        DB::table('TipoDeDatil')->insert([
            'id' => 1,
            'nombre_datil' => "4greqrfveqv",
            'descripcion' => "rewvgtbw",
            'costo' => 500,
            'tipo' => 1,
            'estatus' => 1,
        ]);
        DB::table('TipoDeDatil')->insert([
            'id' => 2,
            'nombre_datil' => "42g24grvw",
            'descripcion' => "hy6egwrferw",
            'costo' => 480,
            'tipo' => 1,
            'estatus' => 1,
        ]);
        DB::table('TipoDeDatil')->insert([
            'id' => 3,
            'nombre_datil' => "i24gh9fu3rn",
            'descripcion' => "fkewjfjnrj",
            'costo' => 1240,
            'tipo' => 1,
            'estatus' => 1,
        ]);
    }
}
