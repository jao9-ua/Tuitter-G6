<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [];

        for ($i = 0; $i < 10; $i++) {
            $nombre = $this->generateRandomName();
            $email = $this->generateRandomEmail();
            $password = Hash::make('password'); // Contraseña fija para todos los usuarios generados
            $esAdmin = mt_rand(0, 1); // Valor aleatorio para 'es_Admin' (0 o 1)

            $usuarios[] = [
                'Nombre' => $nombre,
                'email' => $email,
                'password' => $password,
                'es_Admin' => $esAdmin,
                'foto' => 'images/usuario.jpeg',
            ];
        }

        // Insertar registros en la tabla 'Usuario'
        DB::table('Usuario')->insert($usuarios);
    }

    /**
     * Generate a random name.
     *
     * @return string Random name
     */
    private function generateRandomName()
    {
        $names = ['John', 'Jane', 'David', 'Sarah', 'Michael', 'Emily', 'Daniel', 'Olivia'];
        $lastNames = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Miller', 'Davis', 'Garcia'];

        $randomName = $names[array_rand($names)];
        $randomLastName = $lastNames[array_rand($lastNames)];

        return $randomName . ' ' . $randomLastName;
    }

    /**
     * Generate a random email.
     *
     * @return string Random email
     */
    private function generateRandomEmail()
    {
        $domains = ['example.com', 'test.com', 'domain.com', 'email.com'];

        $randomName = strtolower(Str::random(5)); // Generate a random string of length 5
        $randomDomain = $domains[array_rand($domains)];

        return $randomName . '@' . $randomDomain;
    }
}