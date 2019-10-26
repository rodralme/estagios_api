<?php

namespace App\Http\Controllers;

use App\Helpers\Responder;
use App\Http\Requests\UploadRequest;
use App\Http\Requests\VagaSaveRequest;
use App\Http\Resources\VagaIndexResource;
use App\Http\Resources\VagaViewResource;
use App\Models\Vaga;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    public function index(Request $request)
    {
        $dados = Vaga::join('areas_atuacao', 'areas_atuacao.id', '=', 'vagas.area_atuacao_id')
            ->when($request->has('area'), function ($query) use ($request) {
                $query->where('areas_atuacao.sigla', $request->input('area'));
            })
            ->select(
                'vagas.*',
                'areas_atuacao.nome as area',
                'areas_atuacao.sigla as sigla'
            )
            ->paginate(self::PER_PAGE);

        return VagaIndexResource::collection($dados);
    }

    public function view(Vaga $vaga)
    {
        return Responder::success(new VagaViewResource($vaga));
    }

    public function store(VagaSaveRequest $request)
    {
        $vaga = Vaga::create($request->all());

        return $this->view($vaga);
    }

    public function update(Request $request, Vaga $vaga)
    {
        $vaga->update($request->all());

        return $this->view($vaga);
    }

    public function candidatar(Vaga $vaga)
    {
        $vaga->candidatos()->attach(auth()->id(), ['data' => Carbon::now()]);

        return $this->view($vaga);
    }
}
