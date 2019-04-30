<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmpresaIndexResource;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(Request $request)
    {
        $dados = Empresa::all();

        return EmpresaIndexResource::collection($dados);
    }
}
