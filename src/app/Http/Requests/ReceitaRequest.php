<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'required',
            'valor' => 'required',
            'data' => 'required',
            'category_id' => 'required',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'A Descrição da Receita É Obrigatória!',
            'valor.required' => 'Valor da Receita é Obrigatória',
            'data.required' => 'Data da Receita é Obrigatória',
            'category_id.required' => 'Categoria é Obrigatória',
            'user_id.required' => 'Usuário é Obrigatório'
        ];
    }
}
