<?php

namespace Tests\Feature;

use App\Models\Empresa;
use App\Models\Usuario;
use Tests\TestCase;

class EmpresaTest extends TestCase
{
//    /**
//     * @test
//     */
//    public function usuarioConsegueListarEmpresas()
//    {
//        $usuario = factory(Usuario::class)->create();
//
//        factory(Empresa::class, 4)->create();
//
//        $this->actingAs($usuario)->json('get', 'api/empresas')
//            ->assertJson(['meta' => ['total' => 4]]);
//    }
//
//    /**
//     * @test
//     */
//    public function usuarioConsegueVisualizarUmaEmpresa()
//    {
//        $usuario = factory(Usuario::class)->create();
//
//        $empresa = factory(Empresa::class)->create();
//        $id = $empresa->id;
//        $empresa->load('endereco');
//
//        $this->actingAs($usuario)->json('get', 'api/empresas/'.$id)
//            ->assertJsonFragment(['id' => $id])
//            ->assertJsonFragment(['logradouro' => $empresa->endereco->logradouro]);
//    }
}
