<?php

namespace Database\Seeders;

use App\Models\Hilo;
use Illuminate\Database\Seeder;

class HiloSeeder extends Seeder
{
    public function run()
    {
        Hilo::create([
            'id' => '1',
            'texto' => 'Este es el primer hilo',
            'imagen' => 'imagen1.jpg',
            'fecha' => '2022-01-01'
        ]);

        Hilo::create([
            'texto' => 'Este es el segundo hilo',
            'imagen' => 'imagen2.jpg',
            'fecha' => '2022-01-02'
        ]);

        Hilo::create([
            'texto' => 'Este es el tercer hilo',
            'imagen' => 'imagen3.jpg',
            'fecha' => '2022-01-03'
        ]);
    }
}
