<?php

use App\Http\Controllers\API\CategoryReceitaController;
use App\Http\Controllers\API\ReceitaController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
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

Route::apiResource('/user', UserController::class);
Route::apiResource('/category-receitas', CategoryReceitaController::class);
Route::apiResource('/receitas', ReceitaController::class);
Route::get('/receitas/user/{user_id}', [ReceitaController::class, 'getAllUserReceitas']);