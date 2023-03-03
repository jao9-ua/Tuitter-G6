<?php

use Illuminate\Database\Seeder;

use App\Models;
use App\Models\Categoria;
use App\Models\Hilo;
use App\Models\Tuit;



class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(HiloSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(TuitSeeder::class);
    }
}

class HiloSeeder extends Seeder
{
    public function run()
    {
        // Creamos algunos hilos de ejemplo
        Hilo::create([
            'texto' => 'Este es el primer hilo de ejemplo',
            'imagen' => 'imagen1.jpg',
            'fecha' => '2023-03-01 10:00:00'
        ]);

        Hilo::create([
            'texto' => 'Este es el segundo hilo de ejemplo',
            'imagen' => 'imagen2.jpg',
            'fecha' => '2023-03-02 11:00:00'
        ]);

        Hilo::create([
            'texto' => 'Este es el tercer hilo de ejemplo',
            'imagen' => 'imagen3.jpg',
            'fecha' => '2023-03-03 12:00:00'
        ]);
    }
}

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        // Creamos algunas categorías de ejemplo
        Categoria::create([
            'hashtag' => '#deporte',
            'views' => 1000,
            'imagen' => 'deporte.jpg'
        ]);

        Categoria::create([
            'hashtag' => '#arte',
            'views' => 500,
            'imagen' => 'arte.jpg'
        ]);

        Categoria::create([
            'hashtag' => '#tecnología',
            'views' => 2000,
            'imagen' => 'tecnologia.jpg'
        ]);

        // Asignamos algunas categorías a los hilos de ejemplo
        Hilo::find(1)->categoria()->associate(Categoria::find(1))->save();
        Hilo::find(2)->categoria()->associate(Categoria::find(2))->save();
        Hilo::find(3)->categoria()->associate(Categoria::find(3))->save();
    }
}

class TuitSeeder extends Seeder
{
    public function run()
    {
        // Creamos algunos tuits de ejemplo
        Tuit::create([
            'texto' => 'Este es el primer tuit del primer hilo',
            'imagen' => 'tuit1.jpg',
            'fecha' => '2023-03-01 10:01:00',
            'orden' => 1,
            'id_hilo' => 1
        ]);
    }
}