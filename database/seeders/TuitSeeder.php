<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use App\Models\Tuit;
use Database\Factories\HiloFactory;

class TuitSeeder extends Seeder
{
    public function run()
    {
        $hilosCount = 20;

        for ($i = 0; $i < $hilosCount; $i++) {
            $hilo = HiloFactory::new()->create();            

            $tuitsCount = random_int(1, 5);

            for ($j = 0; $j < $tuitsCount; $j++) {
                Tuit::factory()->create(['hilo_id' => $hilo->id]);            }
        }
    }
}
