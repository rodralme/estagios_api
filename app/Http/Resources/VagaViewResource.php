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
        $this->resource->load('empresa', 'areas');

        return [
            'id' => $this->id,
            'ativo' => !$this->trashed(),
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'remuneracao' => $this->remuneracao,
            'carga_horaria' => $this->carga_horaria . ' horas semanais',
            'empresa' => new EmpresaViewResource($this->whenLoaded('empresa')),
            'areas' => AreaViewResource::collection($this->whenLoaded('areas')),
        ];
    }
}
