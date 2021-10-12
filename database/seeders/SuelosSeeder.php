<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuelosSeeder extends Seeder
{
    public function run()
    {
        DB::table('suelos')->insert([
            'id' => 1,
            'tipo_de_suelo' => 'Suelos arenosos'
        ]);
        DB::table('suelos')->insert([
            'id' => 2,
            'tipo_de_suelo' => 'Suelos calizos'
        ]);
        DB::table('suelos')->insert([
            'id' => 3,
            'tipo_de_suelo' => 'Suelos arcillosos'
        ]);
        DB::table('suelos')->insert([
            'id' => 4,
            'tipo_de_suelo' => 'Suelos pedregosos'
        ]);
        DB::table('suelos')->insert([
            'id' => 5,
            'tipo_de_suelo' => 'Suelos Mixtos'
        ]);
    }
}
