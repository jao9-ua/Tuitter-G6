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
            $eventoCount = random_int(5, 9);

            for ($i = 0; $i < $eventoCount; $i++) {
                $fecha = $faker->dateTimeBetween(20-01-01, '+3 year')->format('Y-m-d');
                $evento = new Evento();
                $evento->texto = 'Evento ' . ($i + 1);
                $evento->imagen = 'images/evento.jpeg';
                $evento->fecha_ini = $fecha;
                $evento->fecha_post = now();
                $evento->fecha_fin = $faker->dateTimeBetween($fecha, '+3 year')->format('Y-m-d');
                $evento->categoria()->associate($categoria);

                // Obtener una colección de IDs de usuarios relacionados con el evento
                $usuarioIds = Usuario::inRandomOrder()->limit(3)->pluck('id');

                // Obtener un usuario aleatorio
                $usuario = Usuario::inRandomOrder()->first();
                $evento->usuario()->associate($usuario);

                $evento->save();
            }
        }
    }
}
