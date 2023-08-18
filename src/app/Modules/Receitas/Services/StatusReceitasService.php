<?php 

namespace App\Modules\Receitas\Services;

use App\Exceptions\NotFoundExceptions;
use App\Modules\Receitas\Contracts\IStatusReceitasRepository;

class StatusReceitasService 
{
    private $repository;
    
    public function __construct(IStatusReceitasRepository $statusRepository)
    {
        $this->repository = $statusRepository;
    }

    public function createANewStatus($request)
    {
        $status = $this->repository->create($request);
        if(empty($status)) {
            throw new NotFoundExceptions('Erro ao Adicionar novo Status!', 400);
        }

        return ['data' => $status, 
                'message' => 'Status foi Adicionado!', 
                'status' => 201];
    }

    public function getAllStatus()
    {
        $status = $this->repository->getAllStatusReceitas();

        return ['data' => $status, 'message' => 'Status Encontrado!', 
        'status' => 200];
    }
}