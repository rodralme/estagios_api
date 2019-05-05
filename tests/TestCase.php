<?php

namespace Tests;

use App\Models\Perfil;
use App\Models\Permissao;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected $sufixoPermissao = null;

    protected function mockUsuarioComPermissoes()
    {
        $perfil = factory(Perfil::class)->create(['nivel' => 1]);

        $permissoes = [];
        foreach (func_get_args() as $permissao) {
            $permissoes[] = Permissao::where('tag', $permissao)->first()->id;
        }

        $perfil->permissoes()->sync($permissoes);

        $usuario = factory(Usuario::class)->create(['perfil_id' => $perfil->id]);

        return $usuario;
    }

    protected function mockUsuarioVisualiza()
    {
        return $this->mockUsuarioComPermissoes('visualizar_' . $this->sufixoPermissao);
    }

    protected function mockUsuarioCadastra()
    {
        return $this->mockUsuarioComPermissoes('cadastrar_editar_' . $this->sufixoPermissao);
    }
}
