<?php

namespace Tests\Unit;

use App\Modules\Receitas\Repositories\CategoryReceitasRepositoryInMemory;
use App\Modules\Receitas\Services\CategoryReceitasService;
use PHPUnit\Framework\TestCase;

class CategoryReceitasTest extends TestCase
{

    private $categoryReceitasRepositoryInMemory;
    private $categoryReceitasService;

    public function getDependecies()
    {
        $this->categoryReceitasRepositoryInMemory = new CategoryReceitasRepositoryInMemory();
        $this->categoryReceitasService = new CategoryReceitasService($this->categoryReceitasRepositoryInMemory);
    }

    public function testSholdBeAbleCreateNewCategoryReceita(): void
    {
        $this->getDependecies();
        
        $data = array(
            'name' => 'any_name',
            'description' => 'any_description'
        );

        $newCategory = $this->categoryReceitasService->createNewCategory($data);
        $this->assertEquals($newCategory['status'], 201);
    }
}
