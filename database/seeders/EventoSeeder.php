<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Usuario;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria1 = new Categoria();
        $categoria1->hashtag = 'universidad';
        $categoria1->views = '50';
        $categoria1->save();

        $usuario1 = new Usuario();
        $usuario1->Nombre = 'sdfsdfsdf';
        $usuario1->email = 'janpsidjfsdfth@example.com';
        $usuario1->password = Hash::make('password');
        $usuario1->es_Admin = true;
        $usuario1->save();
        
        $usuario2 = new Usuario();
        $usuario2->Nombre = 'jijsdsdo';
        $usuario2->email = 'jijasdaso@example.com';
        $usuario2->password = Hash::make('password');
        $usuario2->es_Admin = true;
        $usuario2->save();



        $eventos1 = new Evento();
        $eventos1->texto ='Evento 1';
        $eventos1->imagen ='imagen1.jpg';
        $eventos1->fecha_ini ='2023-06-01';
        $eventos1->fecha_post =now();
        $eventos1->fecha_fin = '2023-05-20';
        $eventos1->usuario()->associate($usuario1);
        $eventos1->categoria()->associate($categoria1);

        $eventos1->save();

        $eventos2 =new Evento();
        $eventos2->texto = 'Evento 2';
        $eventos2->imagen = 'imagen2.jpg';
        $eventos2->fecha_ini = '2023-06-01';
        $eventos2->fecha_post = now();
        $eventos2->fecha_fin = '2023-06-10';
        $eventos1->usuario()->associate($usuario2);
        $eventos2->categoria()->associate($categoria1);
        $eventos2->save();

        $categoria1->evento()->saveMany([$eventos1, $eventos2]);
        $usuario1->evento()->saveMany([$eventos1]);
        $usuario2->evento()->saveMany([$eventos2]);
        
    }
}
