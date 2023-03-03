<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tuit;

class TuitSeeder extends Seeder
{
    public function run()
    {
        Tuit::create([
            'texto' => 'Primer tuit',
            'imagen' => 'imagen1.jpg',
            'fecha' => '2022-02-01',
            'orden' => 1,
            'hilo_id' => 1,
        ]);

        Tuit::create([
            'texto' => 'Segundo tuit',
            'imagen' => 'imagen2.jpg',
            'fecha' => '2022-02-02',
            'orden' => 2,
            'hilo_id' => 1,
        ]);

        Tuit::create([
            'texto' => 'Tercer tuit',
            'imagen' => 'imagen3.jpg',
            'fecha' => '2022-02-03',
            'orden' => 1,
            'hilo_id' => 2,
        ]);
    }
}