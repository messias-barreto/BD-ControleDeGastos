<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ];
    }


    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array<string, string>
    */
    
    public function messages(): array
    {
        return [
            'name.required' => 'O Nome é Obrigatório',
            'email.required' => 'O Email é Obrigatório',
            'email.unique' => 'Email Já foi Cadastrado',
            'email.email' => 'Email Não é Válido',
            'password.required' => 'A Senha é Obrigatória'
        ];
    }
}
