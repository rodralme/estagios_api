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
        return [
            'id' => $this->id,
            'ativo' => !$this->trashed(),
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'remuneracao' => $this->remuneracao,
            'carga_horaria' => $this->carga_horaria . ' horas semanais',
            'empresa' => $this->empresa,
            'areas' => $this->areas,
        ];
    }
}
