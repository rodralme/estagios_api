<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmpresaIndexResource;
use App\Http\Resources\EmpresaViewResource;
use App\Http\Resources\VagaIndexResource;
use App\Http\Resources\VagaViewResource;
use App\Models\AreaAtuacao;
use App\Models\Empresa;
use App\Models\Vaga;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VagaController extends Controller
{
    public function index(Request $request)
    {
        $areas = AreaAtuacao::select(
                'vagas_areas_atuacao.vaga_id',
                DB::raw("GROUP_CONCAT(areas_atuacao.nome separator ', ') as areas")
            )
            ->join('vagas_areas_atuacao', 'vagas_areas_atuacao.area_atuacao_id', '=', 'areas_atuacao.id')
            ->groupBy('vagas_areas_atuacao.vaga_id');

        $dados = Vaga::join('empresas', 'empresas.id', '=', 'vagas.empresa_id')
            ->leftJoinSub($areas, 'areas', function (JoinClause $join) {
                $join->on('vagas.id', '=', 'areas.vaga_id');
            })
            ->select(
                'vagas.*',
                'empresas.nome as empresa',
                'areas.areas'
            )
            ->paginate(self::PER_PAGE);

        return VagaIndexResource::collection($dados);
    }

    public function view(Vaga $vaga)
    {
        return new VagaViewResource($vaga);
    }
}
