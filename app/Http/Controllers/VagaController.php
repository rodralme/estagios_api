<?php

namespace App\Http\Controllers;

use App\Http\Resources\VagaIndexResource;
use App\Http\Resources\VagaViewResource;
use App\Models\Vaga;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    public function index(Request $request)
    {
        $dados = Vaga::join('empresas', 'empresas.id', '=', 'vagas.empresa_id')
            ->select(
                'vagas.*',
                'empresas.nome as empresa'
            )
            ->paginate(self::PER_PAGE);

        return VagaIndexResource::collection($dados);
    }

    public function view(Vaga $vaga)
    {
        return new VagaViewResource($vaga);
    }
}
