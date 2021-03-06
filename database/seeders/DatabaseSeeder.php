<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(SuelosSeeder::class);
        $this->call(PrediosSeeder::class);
        // $this->call(TipoDatilSeeder::class);
        // $this->call(PalmerasSeeder::class);
        $this->call(PrediosControlSeeder::class);
        $this->call(VariedadDeDatilSeeder::class);
        $this->call(PalmeraSeeder::class);
        $this->call(CosechaSeeder::class);
        $this->call(ContenedoresSeeder::class);
        $this->call(ContenedorCosechaSeeder::class);
        $this->call(ActividadesSeeder::class);
        $this->call(VentasControlSeeder::class);
    }
}
