<?php

namespace App\Modules\Receitas\Repositories\Eloquent;

use App\Models\Receita;
use App\Modules\Receitas\Contracts\IReceitasRepository;

class ReceitasRepository implements IReceitasRepository
{
    private $repository;
    
    public function __construct()
    {
        $this->repository = app(Receita::class);
    }
    
    public function create($receita)
    {
        $user = $this->repository->create($receita);
        return $user;
    }

    public function getReceitasByUserId($user_id)
    {
        return $this->repository->where('user_id', '=', $user_id)->get();
    }

    public function getReceitaById($id)
    {
        return $this->repository->find($id);
    }
}