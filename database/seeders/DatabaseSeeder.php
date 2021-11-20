<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(SuelosSeeder::class);
        $this->call(PrediosSeeder::class);
        $this->call(TipoDatilSeeder::class);
        $this->call(PalmerasSeeder::class);
    }
}
