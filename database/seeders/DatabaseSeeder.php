<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\CategoriaFactory;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        CategoriaFactory::new()->count(20)->create();
        $this->call(UsuarioSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(HiloSeeder::class);
        $this->call(TuitSeeder::class);
        $this->call(EventoSeeder::class);
        $this->call(UsuarioHiloSeeder::class);
        $this->call(UsuarioTuitSeeder::class);
        $this->call(CategoriaUsuarioSeeder::class);
    }
    
}
