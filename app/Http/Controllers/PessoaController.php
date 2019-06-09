<?php

namespace App\Http\Controllers;

use App\Helpers\Responder;
use App\Http\Requests\PessoaSaveRequest;
use App\Http\Resources\PessoaViewResource;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    public function view(Pessoa $pessoa)
    {
        return Responder::success(new PessoaViewResource($pessoa));
    }

    public function update(PessoaSaveRequest $request, Pessoa $pessoa)
    {
        $pessoa->update($request->all());

        return $this->view($pessoa);
    }
}
