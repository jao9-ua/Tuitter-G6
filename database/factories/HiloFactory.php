<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Hilo;
use App\Models\Usuario;

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
            'categoria_id' =>$this->faker->numberBetween(1, 20),
            'usuario_id' => function () {
                return Usuario::factory()->create()->id;
            },
        ];
    }
}