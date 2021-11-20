<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PalmerasSeeder extends Seeder
{
    public function run()
    {
        DB::table('Palmeras')->insert([
            'id' => 'PAL001',
            'tipo_palmera' => 1,
            'predio_id' => 'P001',
            'tipo_datil' => 2,
            'estatus' => 1,
        ]);
        DB::table('Palmeras')->insert([
            'id' => 'PAL002',
            'tipo_palmera' => 1,
            'predio_id' => 'P001',
            'tipo_datil' => 3,
            'estatus' => 1,
        ]);
        DB::table('Palmeras')->insert([
            'id' => 'PAL003',
            'tipo_palmera' => 1,
            'predio_id' => 'P002',
            'tipo_datil' => 2,
            'estatus' => 1,
        ]);
        DB::table('Palmeras')->insert([
            'id' => 'PAL004',
            'tipo_palmera' => 1,
            'predio_id' => 'P003',
            'tipo_datil' => 3,
            'estatus' => 1,
        ]);
        DB::table('Palmeras')->insert([
            'id' => 'PAL005',
            'tipo_palmera' => 1,
            'predio_id' => 'P005',
            'tipo_datil' => 3,
            'estatus' => 1,
        ]);
        DB::table('Palmeras')->insert([
            'id' => 'PAL006',
            'tipo_palmera' => 1,
            'predio_id' => 'P005',
            'tipo_datil' => 2,
            'estatus' => 1,
        ]);
    }
}
