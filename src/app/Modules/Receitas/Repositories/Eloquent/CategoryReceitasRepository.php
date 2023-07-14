<?php

namespace App\Modules\Receitas\Repositories\Eloquent;

use App\Models\CategoryReceita;
use App\Modules\Receitas\Contracts\ICategoryReceitasRepository;

class CategoryReceitasRepository implements ICategoryReceitasRepository
{
    private $repository;
    public function __construct()
    {
        $this->repository = app(CategoryReceita::class);
    }
    
    public function createNewCategory($category)
    {
        $newCategory = $this->repository->create($category);
        return $newCategory;
    }

    public function getAllCategories()
    {
        $category = $this->repository->all();
        return $category;
    }

    public function getCategoryById($id)
    {
        $category = $this->repository->find($id);
        return $category;
    }

    public function getCategoryByName($name)
    {
        $category = $this->repository
                            ->where('name', 'like', $name)
                            ->get();

        return $category;
    }
}