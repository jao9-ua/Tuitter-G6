<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos = [
            [
                'categoria_id' => 1,
                'usuario_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 2,
                'usuario_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Agrega más datos si es necesario
        ];

        // Insertar los datos en la tabla categoria_usuario
        DB::table('categoria_usuario')->insert($datos);
    }
}
