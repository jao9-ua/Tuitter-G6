<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioHiloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarioHilos = [
            [
                'Fecha' => '2023-05-20',
                'usuario_id' => 1,
                'hilo_id' => 1,
            ],
            [
                'Fecha' => '2023-06-10',
                'usuario_id' => 2,
                'hilo_id' => 2,
            ],
            // Agrega más registros si lo deseas
        ];

        DB::table('usuario_hilo')->insert($usuarioHilos);
    }
}
