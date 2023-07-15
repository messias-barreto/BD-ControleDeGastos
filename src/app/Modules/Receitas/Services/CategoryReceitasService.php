<?php

namespace App\Modules\Receitas\Services;

use App\Exceptions\NotFoundExceptions;
use App\Modules\Receitas\Contracts\ICategoryReceitasRepository;
use Error;
use Exception;

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
            throw new Exception('Não foi Possível Cadastrar a Nova Categoria');
        }

        return ['data' => $newCategory, 'message' => 'Categoria Cadastrada!', 'status' => 201];
    }

    public function getAllCategories()
    {
        $categories = $this->repository->getAllCategories();
        if(empty($categories)){
            return throw new NotFoundExceptions('Nenhuma Categoria foi Encontrada', 400);
        }

        return ['data' => $categories, 'message' => 'Categoria(s) Encontrada(s)!', 'status' => 200];
    }

    public function getCategoryById($id)
    {
        $category = $this->repository->getCategoryById($id);
        if(empty($category)) {
            return throw new NotFoundExceptions('Categoria não foi Encontrada', 400); 
        }

        return ['data' => $category, 'message' => 'Categoria(s) Encontrada(s)!', 'status' => 200];
    }
}