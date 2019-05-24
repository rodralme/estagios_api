<?php

namespace App\Http\Controllers;

use App\Http\Resources\PessoaViewResource;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    public function view(Pessoa $pessoa)
    {
        return new PessoaViewResource($pessoa);
    }
}
