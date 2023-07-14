<?php 


namespace App\Modules\Receitas\Repositories;
use App\Modules\Receitas\Contracts\ICategoryReceitasRepository;

class CategoryReceitasRepositoryInMemory implements ICategoryReceitasRepository
{
    private $category = array();

    public function createNewCategory($request)
    {
        array_push($this->category, $request);
        return end($this->category);
        
    }

    public function getAllCategories()
    {
        return $this->category;
    }

    public function getCategoryById($id)
    {
        foreach($this->category as $c) {
            if($c['id'] == $id){
                return $c;
            }

            return null;
        }
    }

    public function getCategoryByName($name)
    {
        $newArray = array();

        foreach($this->category as $c) {
            if($c['name'] == $name){
                array_push($newArray, $c);
            }

            return $newArray;
        }
    }
} 