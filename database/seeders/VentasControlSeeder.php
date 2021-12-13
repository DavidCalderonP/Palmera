<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentasControlSeeder extends Seeder
{
    public function run()
    {
        DB::table('VentasControl')->insert([
            'id' => 1,
        ]);
    }
}
