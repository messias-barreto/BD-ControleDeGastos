<?php 

namespace App\Modules\Receitas\Contracts;

interface ICategoryReceitasRepository 
{
    public function createNewCategory($category);
    public function getAllCategories();
    public function getCategoryById($id);
    public function getCategoryByName($name);
}