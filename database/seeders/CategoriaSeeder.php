<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        Categoria::create([
            'hashtag' => 'futbol',
            'views' => 1000,
            'imagen' => 'categoria1.jpg',
        ]);

        Categoria::create([
            'hashtag' => 'cine',
            'views' => 500,
            'imagen' => 'categoria2.jpg',
        ]);

        Categoria::create([
            'hashtag' => 'tecnología',
            'views' => 800,
            'imagen' => 'categoria3.jpg',
        ]);
    }
}