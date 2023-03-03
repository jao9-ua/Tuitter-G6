<?php

namespace Tests\Unit\Models;

use App\Models\Hilo;
use App\Models\Tuit;
use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class HiloTest extends TestCase
{
    use RefreshDatabase;

    public function test_hilo_puede_pertenecer_a_una_categoria()
    {
        $categoria = Categoria::factory()->create();
        $hilo = Hilo::factory()->create(['categoria_id' => $categoria->id]);

        $this->assertInstanceOf('App\Models\Categoria', $hilo->categoria);
        $this->assertEquals($categoria->id, $hilo->categoria->id);
    }

    public function test_hilo_puede_tener_varios_tuits()
    {
        $hilo = Hilo::factory()->create();
        $tuits = Tuit::factory()->count(5)->create(['hilo_id' => $hilo->id]);

        $this->assertEquals(5, $hilo->tuit->count());
        $this->assertInstanceOf('App\Models\Tuit', $hilo->tuit->first());
    }
}