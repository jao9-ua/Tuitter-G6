<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioTuitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarioTuits = [
            [
                'Fecha' => '2023-05-20',
                'usuario_id' => 1,
                'tuit_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Fecha' => '2023-06-10',
                'usuario_id' => 2,
                'tuit_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Agrega más registros si lo deseas
        ];

        DB::table('usuario_tuit')->insert($usuarioTuits);
    }
}
