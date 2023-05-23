<?php

namespace Database\Seeders;

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
        $usuarioIds = DB::table('Usuario')->pluck('id');
        $tuitIds = DB::table('Tuit')->pluck('id');
        $fechaInicial = '2023-01-01';
        $fechaFinal = '2023-12-31';

        $usuarioTuits = [];

        // Generar registros aleatorios
        for ($i = 0; $i < 10; $i++) {
            $usuarioId = $usuarioIds->random();
            $tuitId = $tuitIds->shift();
            $fecha = $this->generateRandomDate($fechaInicial, $fechaFinal);

            $usuarioTuits[] = [
                'Fecha' => $fecha,
                'usuario_id' => $usuarioId,
                'tuit_id' => $tuitId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertar registros en la tabla 'usuario_tuit'
        DB::table('usuario_tuit')->insert($usuarioTuits);
    }

    /**
     * Generate a random date between two given dates.
     *
     * @param string $startDate Start date (Y-m-d)
     * @param string $endDate   End date (Y-m-d)
     * @return string Random date (Y-m-d)
     */
    private function generateRandomDate($startDate, $endDate)
    {
        $startTimestamp = strtotime($startDate);
        $endTimestamp = strtotime($endDate);

        $randomTimestamp = mt_rand($startTimestamp, $endTimestamp);

        return date('Y-m-d', $randomTimestamp);
    }
}
