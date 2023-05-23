<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

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
        $faker = Faker::create();

        // Obtener todas las categorías
        $categorias = Categoria::all();
        
        // Crear eventos aleatorios para cada categoría
        foreach ($categorias as $categoria) {
            $eventoCount = random_int(0, 5);

            for ($i = 0; $i < $eventoCount; $i++) {
                $evento = new Evento();
                $evento->texto = 'Evento ' . ($i + 1);
                $evento->imagen = 'Logo_tuit.jpeg';
                $evento->fecha_ini = $faker->date('Y-m-d');
                $evento->fecha_post = now();
                $evento->fecha_fin = $faker->date('Y-m-d');
                $evento->categoria()->associate($categoria);

                // Obtener una colección de IDs de usuarios relacionados con el evento
                $usuarioIds = Usuario::inRandomOrder()->limit(3)->pluck('id');

                // Asociar los usuarios al evento utilizando el método attach()
                $evento->usuarios()->attach($usuarioIds);

                $evento->save();
            }
        }
    }
}
