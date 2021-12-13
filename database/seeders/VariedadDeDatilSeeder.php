<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariedadDeDatilSeeder extends Seeder
{
    public function run()
    {
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Dátil Medjool',
            'descripcion' => 'Principal variedad de Israel, grande, tierna, y dulce.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Dátil Deglet Noor',
            'descripcion' => 'También dátil Moscatel, es tan tierno como exquisito.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Dátil Halawy',
            'descripcion' => 'Tierno y dulce. Es una de las mejores variedades.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Dátil Zahid',
            'descripcion' => 'No es tan dulce como otras variedades.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Dátil Medjool',
            'descripcion' => 'Principal variedad de Israel, grande, tierna, y dulce.',
            'costo' => 50.0,
            'tipo_datil' => 1,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Dátil Deglet Noor',
            'descripcion' => 'También dátil Moscatel, es tan tierno como exquisito.',
            'costo' => 50.0,
            'tipo_datil' => 1,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Dátil Halawy',
            'descripcion' => 'Tierno y dulce. Es una de las mejores variedades.',
            'costo' => 50.0,
            'tipo_datil' => 1,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Dátil Zahid',
            'descripcion' => 'No es tan dulce como otras variedades.',
            'costo' => 50.0,
            'tipo_datil' => 1,
            'estatus' => 1
        ]);
    }
}


