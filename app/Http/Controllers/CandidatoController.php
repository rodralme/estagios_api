<?php

namespace App\Http\Controllers;

use App\Http\Resources\CandidatoViewResource;
use App\Models\Candidato;

class CandidatoController extends Controller
{
    public function view(Candidato $candidato)
    {
        return new CandidatoViewResource($candidato);
    }
}
