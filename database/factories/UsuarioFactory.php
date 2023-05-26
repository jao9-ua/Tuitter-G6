<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hilo;
use App\Models\Tuit;
use App\Models\Categoria;
use App\Models\Evento;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $password = Hash::make('password'); // Contraseña fija para todos los usuarios generados
        $esAdmin = mt_rand(0, 1); // Valor aleatorio para 'es_Admin' (0 o 1)

        return [
            'Nombre' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'foto' => 'images/usuario.jpeg',
            'password' => $password, // password
            'es_Admin' => $esAdmin,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
