<?php

use App\Http\Controllers\API\CategoryReceitaController;
use App\Http\Controllers\API\ReceitaController;
use App\Http\Controllers\API\StatusReceitasController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Auth\API\LoginController;
use App\Http\Controllers\Auth\API\LogoutController;
use App\Http\Controllers\Auth\API\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('/user', UserController::class)->middleware('auth:sanctum');
Route::apiResource('/category-receitas', CategoryReceitaController::class)->middleware('auth:sanctum');
Route::apiResource('/receitas', ReceitaController::class)->middleware('auth:sanctum');
Route::apiResource('/status-receitas', StatusReceitasController::class)->middleware('auth:sanctum');
Route::get('/receitas/user/{user_id}', [ReceitaController::class, 'getAllUserReceitas'])->middleware('auth:sanctum');

Route::prefix('auth')->group(function() {
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth:sanctum');
});