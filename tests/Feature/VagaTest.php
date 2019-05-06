<?php

namespace Tests\Feature;

use App\Models\Usuario;
use App\Models\Vaga;
use Tests\TestCase;

class VagaTest extends TestCase
{
    /**
     * @test
     */
    public function usuarioConsegueListarVagas()
    {
        $usuario = factory(Usuario::class)->create();

        factory(Vaga::class, 4)->create();

        $this->actingAs($usuario)->json('get', 'api/vagas')
            ->assertJson(['meta' => ['total' => 4]]);
    }

    /**
     * @test
     */
    public function usuarioConsegueVisualizarUmaVaga()
    {
        $usuario = factory(Usuario::class)->create();

        $vaga = factory(Vaga::class)->create();
        $id = $vaga->id;

        $this->actingAs($usuario)->json('get', 'api/vagas/'.$id)
            ->assertJsonFragment(['id' => $id]);
    }
}
