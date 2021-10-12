<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ClimaSeeder::class);
        $this->call(HumedadSeeder::class);
        $this->call(SuelosSeeder::class);
    }
}
