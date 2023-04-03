<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $categoria1 = new Categoria();
        $categoria1->hashtag = 'universidad';
        $categoria1->views = '50';

        $hilo1 = new Hilo();
        $hilo1->texto = 'hola';
        $hilo1->fecha = '2023-04-03';

        $hilo2 = new Hilo();
        $hilo2->texto = 'adios';
        $hilo2->fecha = '2023-04-03';

        $categoria1->hilo()->saveMany([ $hilo1, $hilo2]);

        $categoria2 = new Categoria();
        $categoria2->hashtag = 'trabajo';
        $categoria2->views = '100';
    }

}