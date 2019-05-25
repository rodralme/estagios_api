<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VagaViewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->resource->load('empresa', 'area');

        return [
            'id' => $this->id,
            'ativo' => !$this->trashed(),
            'created_at' => $this->created_at->diffForHumans(),
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'remuneracao' => $this->remuneracao,
            'carga_horaria' => $this->carga_horaria . ' horas semanais',
            'empresa' => new EmpresaViewResource($this->whenLoaded('empresa')),
            'area' => new AreaViewResource($this->whenLoaded('area')),
        ];
    }
}
