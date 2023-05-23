<?php

namespace Database\Seeders;
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
        $usuarioIds = DB::table('Usuario')->pluck('id');
        $hiloIds = DB::table('Hilo')->pluck('id');
        $fechaInicial = '2023-01-01';
        $fechaFinal = '2023-12-31';

        $usuarioHilos = [];

        // Generar registros aleatorios
        for ($i = 0; $i < 10; $i++) {
            $usuarioId = $usuarioIds->random();
            $hiloId = $hiloIds->random();
            $fecha = $this->generateRandomDate($fechaInicial, $fechaFinal);

            $usuarioHilos[] = [
                'Fecha' => $fecha,
                'usuario_id' => $usuarioId,
                'hilo_id' => $hiloId,
            ];
        }

        // Insertar registros en la tabla 'usuario_hilo'
        DB::table('usuario_hilo')->insert($usuarioHilos);
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

