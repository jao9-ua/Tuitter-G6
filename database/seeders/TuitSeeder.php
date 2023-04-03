<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tuit;

class TuitSeeder extends Seeder
{
    public function run()
    {
        $tuit1 = new Hilo();
        $tuit1->texto = 'hola';
        $tuit1->fecha = '2023-04-03';
        $tuit1->orden = '1';
        $tuit1->save();

        $tuit2 = new Hilo();
        $tuit2->texto = 'hola';
        $tuit2->fecha = '2023-04-03';
        $tuit2->orden = '2';
        $tuit2->save();
    }
}