<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
       auth()->user()->currentAccessToken()->delete();
       return response()->json([], 204);
    }
}
