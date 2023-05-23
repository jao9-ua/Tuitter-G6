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
        $categoria1 = Categoria::create([
            'hashtag' => 'universidad',
            'views' => 50
        ]);

        $usuario1 = Usuario::create([
            'Nombre' => 'sdfsdfsdf',
            'email' => 'janpsidjfsdfth@example.com',
            'password' => Hash::make('password'),
            'es_Admin' => true
        ]);

        $usuario2 = Usuario::create([
            'Nombre' => 'jijsdsdo',
            'email' => 'jijasdaso@example.com',
            'password' => Hash::make('password'),
            'es_Admin' => true
        ]);

        $evento1 = Evento::create([
            'texto' => 'Evento 1',
            'imagen' => 'imagen1.jpg',
            'fecha_ini' => '2023-06-01',
            'fecha_post' => now(),
            'fecha_fin' => '2023-05-20',
        ]);

        $evento2 = Evento::create([
            'texto' => 'Evento 2',
            'imagen' => 'imagen2.jpg',
            'fecha_ini' => '2023-06-01',
            'fecha_post' => now(),
            'fecha_fin' => '2023-06-10',
        ]);

        $evento1->usuario()->attach([$usuario1->id, $usuario2->id]);
        $evento2->usuario()->attach($usuario2->id);

        $evento1->categoria()->associate($categoria1);
        $evento1->save();

        $evento2->categoria()->associate($categoria1);
        $evento2->save();

        $categoria1->evento()->saveMany([$evento1, $evento2]);
        
    }
}
