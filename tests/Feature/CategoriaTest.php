<?php

namespace Tests\Feature;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaTest extends TestCase
{

    /** @test */
    public function initcategoria()
    {
        $categoria1 = new Categoria();
        $categoria1->hashtag = 'universidad';
        $categoria1->views = '50';
        
        $hilo1 = new Hilo();
        $hilo1->texto='hola';
        $hilo1->fecha='2023-04-03';
        $hilo1->categoria()->associate($categoria1);
        $hilo1->save();

        $evento1 = new Evento();
        $evento1->texto='hola';
        $evento1->fecha='2023-04-03';
        $evento1->categoria()->associate($categoria1);
        $evento1->save();

        $this->assertEquals($categoria->hashtag, $hilo1->categoria->hashtag);
        $this->assertEquals($categoria->hilo[0]->texto, $hilo1->texto);

        $hilo1->delete();
        $categoria1->delete();
    }
}