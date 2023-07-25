<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credencials = $request->all();
        if(!auth()->attempt($credencials)) 
            abort(401, 'Login ou Senha Invalido(s)');

        $token = auth()->user()->createToken('auth_token');
        return response()->json(['user' => auth()->user(), 'token' => $token->plainTextToken]);
    }
}
