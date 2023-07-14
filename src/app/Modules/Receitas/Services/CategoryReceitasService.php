<?php

namespace App\Modules\Receitas\Services;

use App\Modules\Receitas\Contracts\ICategoryReceitasRepository;
use Error;

class CategoryReceitasService 
{
    private $repository;

    public function __construct(ICategoryReceitasRepository $categoryReceitasRepository)
    {
        $this->repository = $categoryReceitasRepository;
    }

    public function createNewCategory($category)
    {
        $newCategory = $this->repository->createNewCategory($category);

        if(empty($newCategory)) {
            throw new Error('Não foi Possível Cadastrar a Nova Categoria');
        }

        return ['data' => $newCategory, 'message' => 'Categoria Cadastrada!', 'status' => 201];
    }
}