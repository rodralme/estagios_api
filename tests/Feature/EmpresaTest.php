<?php

namespace Tests\Feature;

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
    public function usuarioConsegueVisualizarEmpresa()
    {
        $usuario = factory(Usuario::class)->create();

        $this->actingAs($usuario)->json('get', 'api/empresas')->assertStatus(200);
    }
}
