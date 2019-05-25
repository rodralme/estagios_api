<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VagaIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->resource->load('area');

        return [
            'id' => $this->id,
            'ativo' => !$this->trashed(),
            'created_at' => $this->created_at->diffForHumans(),
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'inicio' => $this->inicio->format('d/m'),
            'fim' => $this->fim->format('d/m'),
            'remuneracao' => $this->remuneracao,
            'carga_horaria' => $this->carga_horaria . ' horas semanais',
            'empresa' => $this->empresa,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'area' => $this->area,
            'sigla' => $this->sigla,
        ];
    }
}
