<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'Nombre' => 'John asdasdaDoe',
                'email' => 'johndasdasdasasdoe@example.com',
                'password' => Hash::make('password'),
                'es_Admin' => false,
            ],
            [
                'Nombre' => 'Janasdasde Smith',
                'email' => 'janeasdasddsasmith@example.com',
                'password' => Hash::make('password'),
                'es_Admin' => true,
            ],
        ];
        DB::table('Usuario')->insert($users);
    }
}
