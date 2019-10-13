<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VagaSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required',
            'descricao' => 'required',
            'inicio' => 'required|date',
            'fim' => 'required|date',
            'email' => 'required|email',
            'telefone' => 'required|max:15',
            'area_atuacao_id' => 'required',
        ];
    }
}
