<?php

namespace Tests\Feature;

use App\Models\Candidato;
use App\Models\Usuario;
use Tests\TestCase;

class CandidatoTest extends TestCase
{
    /**
     * @test
     */
    public function usuarioConsegueVisualizarUmCandidato()
    {
        $usuario = factory(Usuario::class)->create();

        $candidato = factory(Candidato::class)->create();
        $id = $candidato->id;
        $candidato->load('endereco');

        $this->actingAs($usuario)->json('get', 'api/candidatos/'.$id)
            ->assertJsonFragment(['id' => $id])
            ->assertJsonFragment(['logradouro' => $candidato->endereco->logradouro]);
    }
}
