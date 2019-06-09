<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaSaveRequest extends FormRequest
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
            'nome' => 'required',
            'email' => 'sometimes|email',
            'nascimento' => 'sometimes|date',
            'telefone1' => 'sometimes|max:15',
            'telefone2' => 'sometimes|max:15',
        ];
    }
}
