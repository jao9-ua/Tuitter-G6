<?php

namespace Database\Factories;

use App\Models\Hilo;
use App\Models\Tuit;
use App\Models\Usuario;

use Illuminate\Database\Eloquent\Factories\Factory;

class TuitFactory extends Factory
{
    protected $model = Tuit::class;

    public function definition()
    {
        return [
            'texto' => $this->faker->text(),
            'imagen' => $this->faker->imageUrl(),
            'fecha' => $this->faker->dateTime(),
            'orden' => $this->faker->numberBetween(1, 100),
            'hilo_id' => function () {
                return Hilo::factory()->create()->id;
            },
            'usuario_id' => function () {
                return Usuario::factory()->create()->id;
            },

        ];
    }
}