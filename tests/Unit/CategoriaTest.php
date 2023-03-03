<?php

namespace Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Categoria;

class CategoriaTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_categoria_tiene_atributos()
    {
        $categoria = new Categoria();

        $this->assertClassHasAttribute('hashtag', get_class($categoria));
        $this->assertClassHasAttribute('views', get_class($categoria));
        $this->assertClassHasAttribute('imagen', get_class($categoria));
    }

    public function test_categoria_tiene_relacion_con_hilos()
    {
        $categoria = Categoria::factory()->create();
        $hilo = Hilo::factory()->create(['categoria_id' => $categoria->id]);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $categoria->hilos);
        $this->assertInstanceOf('App\Models\Hilo', $categoria->hilos->first());
    }
}