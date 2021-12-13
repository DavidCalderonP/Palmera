<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrediosControlSeeder extends Seeder
{
    public function run()
    {
        DB::table('PrediosControl')->insert([
            'id' => 'P001',
        ]);
        DB::table('PrediosControl')->insert([
            'id' => 'P002',
        ]);
        DB::table('PrediosControl')->insert([
            'id' => 'P003',
        ]);
        DB::table('PrediosControl')->insert([
            'id' => 'P004',
        ]);
        DB::table('PrediosControl')->insert([
            'id' => 'P005',
        ]);
    }
}
