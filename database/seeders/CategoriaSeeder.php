<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Hilo;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $categoria1 = new Categoria();
        $categoria1->hashtag = 'universidad';
        $categoria1->views = '50';
        $categoria1->save();

        $hilo1 = new Hilo();
        $hilo1->texto = 'hola';
        $hilo1->fecha = '2023-04-03';
        $hilo1->categoria()->associate($categoria1);

        $hilo2 = new Hilo();
        $hilo2->texto = 'adios';
        $hilo2->fecha = '2023-04-03';
        $hilo2->categoria()->associate($categoria1);
        $hilo1->save();
        $hilo2->save();

        $categoria1->hilo()->saveMany([ $hilo1, $hilo2]);

        $categoria2 = new Categoria();
        $categoria2->hashtag = 'trabajo';
        $categoria2->views = '100';
        $categoria2->save();
    }

}