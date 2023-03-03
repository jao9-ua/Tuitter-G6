<?php

namespace Tests\Unit;

use App\Models\Hilo;
use App\Models\Tuit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TuitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_tuit_belongs_to_a_hilo()
    {
        $hilo = Hilo::factory()->create();
        $tuit = Tuit::factory()->create(['hilo_id' => $hilo->id]);

        $this->assertInstanceOf(Hilo::class, $tuit->hilo);
        $this->assertEquals($hilo->id, $tuit->hilo->id);
    }

    /** @test */
    public function a_tuit_can_have_an_image()
    {
        $tuit = Tuit::factory()->create(['imagen' => 'test.jpg']);

        $this->assertEquals('test.jpg', $tuit->imagen);
    }

    /** @test */
    public function a_tuit_has_a_text()
    {
        $tuit = Tuit::factory()->create(['texto' => 'Test tuit']);

        $this->assertEquals('Test tuit', $tuit->texto);
    }

    /** @test */
    public function a_tuit_has_a_date()
    {
        $tuit = Tuit::factory()->create(['fecha' => now()]);

        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $tuit->fecha);
    }

    /** @test */
    public function a_tuit_has_an_order()
    {
        $tuit = Tuit::factory()->create(['orden' => 1]);

        $this->assertEquals(1, $tuit->orden);
    }
}