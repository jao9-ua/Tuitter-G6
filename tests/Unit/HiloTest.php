<?php

namespace Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Hilo;

class HiloTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_hilo_tiene_atributos()
    {
        $hilo = new Hilo();
        $this->assertClassHasAttribute('texto', get_class($hilo));
        $this->assertClassHasAttribute('imagen', get_class($hilo));
        $this->assertClassHasAttribute('fecha', get_class($hilo));
        $this->assertClassHasAttribute('categoria_id', get_class($hilo));
    }

    public function test_hilo_tiene_relacion_con_categoria()
    {
        $categoria = Categoria::factory()->create();
        $hilo = Hilo::factory()->create(['categoria_id' => $categoria->id]);

        $this->assertInstanceOf('App\Models\Categoria', $hilo->categoria);
    }

    public function test_hilo_tiene_relacion_con_tuits()
    {
        $hilo = Hilo::factory()->create();
        $tuit = Tuit::factory()->create(['hilo_id' => $hilo->id]);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $hilo->tuits);
        $this->assertInstanceOf('App\Models\Tuit', $hilo->tuits->first());
    }
}