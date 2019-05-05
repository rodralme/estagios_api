<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaViewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->resource->load('endereco');

        return [
            'id' => $this->id,
            'ativo' => !$this->trashed(),
            'nome' => $this->nome,
            'email' => $this->email,
            'razao_social' => $this->razao_social,
            'cnpj' => $this->cnpj,
            'telefone1' => $this->telefone1,
            'telefone2' => $this->telefone2,
            'sobre' => $this->sobre,
            'endereco' => new EnderecoViewResource($this->whenLoaded('endereco'))
        ];
    }
}
