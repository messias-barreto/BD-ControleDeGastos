<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatusReceitasRequest extends FormRequest
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
            'name' => 'required|unique:status_receitas',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O Nome do Status é Obrigatório!',
            'name.unique' => 'Já existe um Status Cadastrado com Esse Nome!',
            'status.required' => 'O Tipo do Status é Obrigatório!'
        ];
    }
}
