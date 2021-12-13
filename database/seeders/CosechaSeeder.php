<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CosechaSeeder extends Seeder
{
    public function run()
    {
        DB::table('Cosecha')->insert([
            'id_palmera' => 'PAL001',
            'kilogramos' => 500,
            'fecha_cosecha' => "2021-12-12",
            'tipo_cosecha' => 0,
            'estatus' => 1
        ]);
        DB::table('Cosecha')->insert([
            'id_palmera' => 'PAL002',
            'kilogramos' => 500,
            'fecha_cosecha' => "2021-12-12",
            'tipo_cosecha' => 0,
            'estatus' => 1
        ]);
        DB::table('Cosecha')->insert([
            'id_palmera' => 'PAL003',
            'kilogramos' => 500,
            'fecha_cosecha' => "2021-12-12",
            'tipo_cosecha' => 0,
            'estatus' => 1
        ]);
        DB::table('Cosecha')->insert([
            'id_palmera' => 'PAL004',
            'kilogramos' => 500,
            'fecha_cosecha' => "2021-12-12",
            'tipo_cosecha' => 0,
            'estatus' => 1
        ]);
        DB::table('Cosecha')->insert([
            'id_palmera' => 'PAL005',
            'kilogramos' => 500,
            'fecha_cosecha' => "2021-12-12",
            'tipo_cosecha' => 1,
            'estatus' => 1
        ]);
        DB::table('Cosecha')->insert([
            'id_palmera' => 'PAL006',
            'kilogramos' => 500,
            'fecha_cosecha' => "2021-12-12",
            'tipo_cosecha' => 1,
            'estatus' => 1
        ]);
        DB::table('Cosecha')->insert([
            'id_palmera' => 'PAL007',
            'kilogramos' => 500,
            'fecha_cosecha' => "2021-12-12",
            'tipo_cosecha' => 1,
            'estatus' => 1
        ]);
        DB::table('Cosecha')->insert([
            'id_palmera' => 'PAL008',
            'kilogramos' => 500,
            'fecha_cosecha' => "2021-12-12",
            'tipo_cosecha' => 1,
            'estatus' => 1
        ]);
    }
}
