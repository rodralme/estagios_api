<?php

namespace Tests\Feature;

use App\Models\Pessoa;
use App\Models\Usuario;
use Tests\TestCase;

class PessoaTest extends TestCase
{
    /**
     * @test
     */
    public function usuarioConsegueVisualizarUmaPessoa()
    {
        $usuario = factory(Usuario::class)->create();

        $pessoa = factory(Pessoa::class)->create();
        $id = $pessoa->id;
        $pessoa->load('endereco');

        $this->actingAs($usuario)->json('get', 'api/pessoas/'.$id)
            ->assertJsonFragment(['id' => $id])
            ->assertJsonFragment(['logradouro' => $pessoa->endereco->logradouro]);
    }
}
