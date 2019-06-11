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
            'email' => 'sometimes|nullable|email',
            'nascimento' => 'sometimes|nullable|date',
            'telefone1' => 'sometimes|nullable|max:15',
            'telefone2' => 'sometimes|nullable|max:15',
        ];
    }
}
