<?php

namespace Database\Factories;
use Faker\Generator as Faker;
use App\Models\Evento;
use App\Models\Usuario;
use App\Models\Categoria;

$factory->define(Evento::class, function (Faker $faker) {
    return [
        'texto' => $faker->sentence,
        'imagen' => 'Logo_tuit.jpeg',
        'fecha_ini' => $faker->date('Y-m-d'),
        'fecha_post' => now(),
        'fecha_fin' => $faker->date('Y-m-d'),
        'usuario_id' => function () {
            return Usuario::inRandomOrder()->first()->id;
        },
        'categoria_id' => function () {
            return Categoria::inRandomOrder()->first()->id;
        },
    ];
});
