<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JD\Cloudder\Facades\Cloudder;

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
        $this->resource->load('area');

        return [
            'id' => $this->id,
            'ativo' => !$this->trashed(),
            'data' => $this->created_at->format('d/m/Y'),
            'data_fmt' => $this->created_at->diffForHumans(),
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'remuneracao' => $this->remuneracao,
            'carga_horaria' => empty($this->carga_horaria) ? '' : $this->carga_horaria . ' horas semanais',
            'inicio' => $this->inicio->format('d/m'),
            'fim' => $this->fim->format('d/m'),
            'email' => $this->email,
            'telefone' => $this->telefone,
            'empresa' => $this->empresa,
            'banner' => $this->banner,
            'area' => new AreaViewResource($this->whenLoaded('area')),
            'candidatado' => !empty($this->candidatos()->find(auth()->id())),
        ];
    }
}
