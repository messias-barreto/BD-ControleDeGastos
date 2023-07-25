<?php

namespace App\Modules\Receitas\Repositories\Eloquent;

use App\Models\StatusReceitas;
use App\Modules\Receitas\Contracts\IStatusReceitasRepository;

class StatusReceitasRepository implements IStatusReceitasRepository 
{
    private $repository;

    public function __construct()
    {
        $this->repository = app(StatusReceitas::class);
    }

    public function create($request)
    {
        $status = $this->repository->create($request);
        return $status;
    }

    public function getAllStatusReceitas()
    {
        $status = $this->repository->all();
        return $status;
    }

    public function getStatusReceitasById($id)
    {
        $status = $this->repository->find($id);
        return $status;
    }

    public function getStatusReceitasByName($name)
    {
        $status = $this->repository->where('name', 'like', $name)->first();
        return $status;
    }
}