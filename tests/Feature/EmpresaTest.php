<?php

namespace Tests\Feature;

use App\Models\Empresa;
use App\Models\Usuario;
use Tests\TestCase;

class EmpresaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function usuarioConsegueListarEmpresas()
    {
        $usuario = factory(Usuario::class)->create();

        factory(Empresa::class, 4)->create();

        $this->actingAs($usuario)->json('get', 'api/empresas')
            ->assertJson(['meta' => ['total' => 4]]);
    }

    /**
     * @test
     */
    public function usuarioConsegueVisualizarUmaEmpresa()
    {
        $usuario = factory(Usuario::class)->create();

        $id = factory(Empresa::class)->create()->id;

        $this->actingAs($usuario)->json('get', 'api/empresas/'.$id)
            ->assertJsonFragment(['id' => $id]);
    }
}
