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
        $dados = Vaga::join('areas_atuacao', 'areas_atuacao.id', '=', 'vagas.area_atuacao_id')
            ->leftJoin('empresas', 'empresas.id', '=', 'vagas.empresa_id')
            ->when($request->has('area'), function ($query) use ($request) {
                $query->where('areas_atuacao.sigla', $request->input('area'));
            })
            ->select(
                'vagas.*',
                'areas_atuacao.nome as area',
                'areas_atuacao.sigla as sigla',
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
