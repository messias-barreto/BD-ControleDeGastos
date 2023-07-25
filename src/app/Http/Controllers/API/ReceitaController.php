<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReceitaRequest;
use App\Modules\Receitas\Repositories\Eloquent\CategoryReceitasRepository;
use App\Modules\Receitas\Repositories\Eloquent\ReceitasRepository;
use App\Modules\Receitas\Repositories\Eloquent\StatusReceitasRepository;
use App\Modules\Receitas\Services\ReceitasService;
use App\Modules\Users\Repositories\Eloquent\UsersRepository;

class ReceitaController extends Controller
{
    private $receitaService;
    
    private $receitaRepository;
    private $categoryRepository;
    private $statusReceitasRepository;
    private $userRepository;

    public function __construct()
    {
        $this->receitaRepository = app(ReceitasRepository::class);
        $this->categoryRepository = app(CategoryReceitasRepository::class);
        $this->statusReceitasRepository = app(StatusReceitasRepository::class);
        $this->userRepository = app(UsersRepository::class);

        $this->receitaService = new ReceitasService(
                                        $this->receitaRepository,
                                        $this->categoryRepository,
                                        $this->statusReceitasRepository,
                                        $this->userRepository );
    }

    public function store(ReceitaRequest $request)
    {
        $newReceita = $this->receitaService->createNewReceita($request->all());
        return response()->json($newReceita, $newReceita['status']);
    }

    public function getAllUserReceitas($user_id)
    {
        $receitas = $this->receitaService->getAllUsersReceitas($user_id);
        return response()->json($receitas, $receitas['status']);
    }
}
