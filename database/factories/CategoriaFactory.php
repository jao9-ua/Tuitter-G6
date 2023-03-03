<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    public function definition()
    {
        return [
            'hashtag' => $this->faker->word(),
            'views' => $this->faker->numberBetween(0, 1000),
            'imagen' => $this->faker->imageUrl(),
        ];
    }
}