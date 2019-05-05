<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmpresaIndexResource;
use App\Http\Resources\EmpresaViewResource;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(Request $request)
    {
        $dados = Empresa::paginate(self::PER_PAGE);

        return EmpresaIndexResource::collection($dados);
    }

    public function view(Empresa $empresa)
    {
        return new EmpresaViewResource($empresa);
    }
}
