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

Route::get('/user/{id}', [UserController::class, 'find']);
Route::post('/user', [UserController::class, 'create']);

Route::post('/category-receitas', [CategoryReceitaController::class, 'create']);
Route::get('/category-receitas/{id}', [CategoryReceitaController::class, 'find']);
Route::get('/category-receitas', [CategoryReceitaController::class, 'getAllCategories']);
Route::post('/receitas', [ReceitaController::class, 'create']);
Route::get('/receitas/{user_id}', [ReceitaController::class, 'getAllReceitas']);