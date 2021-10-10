<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HumedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('humedad')->insert(['id'=>1, 'nivel_humedad'=>'Alta']);
        DB::table('humedad')->insert(['id'=>2, 'nivel_humedad'=>'Media']);
        DB::table('humedad')->insert(['id'=>3, 'nivel_humedad'=>'Baja']);
    }
}
