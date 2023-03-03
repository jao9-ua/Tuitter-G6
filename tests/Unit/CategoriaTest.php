<?php

namespace Tests\Unit\Models;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function categoria_tiene_atributos_correctos()
    {
        $categoria = new Categoria();
        $atributos = ['hashtag', 'views', 'imagen'];

        $this->assertEquals($atributos, $categoria->getFillable());
    }

    /** @test */
    public function categoria_tiene_hilos()
    {
        $categoria = Categoria::factory()->create();
        $hilo = $categoria->hilo()->create(['texto' => 'Un hilo de prueba']);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $categoria->hilo);
        $this->assertTrue($categoria->hilo->contains($hilo));
    }
}