<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuelosSeeder extends Seeder
{
    public function run()
    {
        DB::table('Suelos')->insert([
            'id' => 1,
            'nombre' => 'Suelos arenosos',
            'descripcion' => 'descripcion del suelo'
        ]);
        DB::table('suelos')->insert([
            'id' => 2,
            'nombre' => 'Suelos calizos',
            'descripcion' => 'descripcion del suelo'
        ]);
        DB::table('suelos')->insert([
            'id' => 3,
            'nombre' => 'Suelos arcillosos',
            'descripcion' => 'descripcion del suelo'
        ]);
        DB::table('suelos')->insert([
            'id' => 4,
            'nombre' => 'Suelos pedregosos',
            'descripcion' => 'descripcion del suelo'
        ]);
        DB::table('suelos')->insert([
            'id' => 5,
            'nombre' => 'Suelos Mixtos',
            'descripcion' => 'descripcion del suelo'
        ]);
    }
}
