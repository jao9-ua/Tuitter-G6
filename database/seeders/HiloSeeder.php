<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tuit;
use Database\Factories\HiloFactory;


class HiloSeeder extends Seeder
{
    public function run()
    {
        $hilosCount = 10;

        for ($i = 0; $i < $hilosCount; $i++) {
            $hilo = HiloFactory::new()->create();            
            $tuitsCount = random_int(1, 5);

            for ($j = 0; $j < $tuitsCount; $j++) {
                Tuit::factory()->create(['hilo_id' => $hilo->id]);
            }
        }
    }
}

