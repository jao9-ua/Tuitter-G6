<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Hilo;
use Illuminate\Database\Eloquent\Factories\Factory;

class HiloFactory extends Factory
{
    protected $model = Hilo::class;

    public function definition()
    {
        return [
            'texto' => $this->faker->text(),
            'imagen' => $this->faker->imageUrl(),
            'fecha' => $this->faker->dateTime(),
            'categoria_id' => Categoria::factory(),
        ];
    }
}