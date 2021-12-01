<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariedadDeDatilSeeder extends Seeder
{
    public function run()
    {
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Medjoul',
            'descripcion' => 'Principal variedad de Israel, grande, tierna, y dulce.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Amary',
            'descripcion' => 'Dátil grande, marrón rojizo y con mucha fibra.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Deglet Nour',
            'descripcion' => 'También dátil Moscatel, es tan tierno como exquisito.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Dayri',
            'descripcion' => 'Con una piel marrón oscuro. Tiene sabor a caramelo.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Halawi',
            'descripcion' => 'Tierno y dulce. Es una de las mejores variedades.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Zahidi',
            'descripcion' => 'No es tan dulce como otras variedades.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Hadrawi',
            'descripcion' => 'Es dulce y carnoso. Se parece a la variedad Halawi.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Khadrawy',
            'descripcion' => 'Este tipo de dátil es más pequeño pero aún así sigue siendo incluso algo más jugosa.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Halawy',
            'descripcion' => 'Es un dátil de pequeño tamaño presentando una piel suave. Cuando llega a su punto idóneo de maduración consigue un sabor dulce muy peculiar con la característica que su carne es cremosa derritiendose casi en la boca.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
        DB::table('VariedadDeDatil')->insert([
            'nombre_datil' => 'Mozafati',
            'descripcion' => 'Este dátil de color oscuro casi negro de origen iraní tiene la particularidad que es capaz de conservarse al natural durante mucho tiempo, puede llegar hasta los dos años sin perder apenas sus cualidades nutritivas.',
            'costo' => 50.0,
            'tipo_datil' => 0,
            'estatus' => 1
        ]);
    }
}


