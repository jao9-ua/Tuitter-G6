<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tuit;
use App\Models\Hilo;


class TuitSeeder extends Seeder
{
    public function run()
    {
        $hilo1 = new Hilo();
        $hilo1->texto = 'hola';
        $hilo1->fecha = '2023-04-03';
        $hilo1->save();

        $tuit1 = new Tuit();
        $tuit1->texto = 'hola';
        $tuit1->fecha = '2023-04-03';
        $tuit1->orden = '1';
        $tuit1->hilo()->associate($hilo1);
        $tuit1->save();

        $tuit2 = new Tuit();
        $tuit2->texto = 'hola';
        $tuit2->fecha = '2023-04-03';
        $tuit2->orden = '2';
        $tuit2->hilo()->associate($hilo1);
        $tuit2->save();

        $hilo1->tuits()->saveMany([$tuit1, $tuit2]);
    }
}