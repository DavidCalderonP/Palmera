<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class prediosSeeder extends Seeder
{
    public function run()
    {

        DB::table('Predios')->insert([
            'id' => "P001",
            'metros_cuadrados' => 15000,
            'numero_palmeras' => 200,
            'tipo_de_suelo' => 1,
            'ph' => 6.5,
            'salinidad' => 3.3,
            'tipo_de_predio' => 1,
            'descripcion' => "algunos datos",
            'fecha_creacion' => "2021-08-10",
            'estatus' => 1,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('Predios')->insert([
            'id' => "P002",
            'metros_cuadrados' => 12331,
            'numero_palmeras' => 123,
            'tipo_de_suelo' => 1,
            'ph' => 7,
            'salinidad' => 3.5,
            'tipo_de_predio' => 1,
            'descripcion' => "bla bla bla bla bla",
            'fecha_creacion' => "2021-03-03",
            'estatus' => 1,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('Predios')->insert([
            'id' => "P003",
            'metros_cuadrados' => 12653,
            'numero_palmeras' => 314,
            'tipo_de_suelo' => 1,
            'ph' => 6.1,
            'salinidad' => 4.3,
            'tipo_de_predio' => 0,
            'descripcion' => "texto texto texto",
            'fecha_creacion' => "2021-03-03",
            'estatus' => 1,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table('Predios')->insert([
            'id' => "P004",
            'metros_cuadrados' => 12334,
            'numero_palmeras' => 231,
            'tipo_de_suelo' => 1,
            'ph' => 6.9,
            'salinidad' => 3.5,
            'tipo_de_predio' => 1,
            'descripcion' => "hola hola hola hola",
            'fecha_creacion' => "2021-03-03",
            'estatus' => 1,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

//			1	6.7	3.5	1	 				1	NULL	NULL
        DB::table('Predios')->insert([
            'id' => "P005",
            'metros_cuadrados' => 54324,
            'numero_palmeras' => 654,
            'tipo_de_suelo' => 1,
            'ph' => 6.7,
            'salinidad' => 3.5,
            'tipo_de_predio' => 1,
            'descripcion' => "i can i can i can i can",
            'fecha_creacion' => "2021-03-03",
            'estatus' => 1,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);
    }
}
