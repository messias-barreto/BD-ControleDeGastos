<?php

namespace Tests\Unit;

use App\Exceptions\NotFoundExceptions;
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

    public function createCategoryReceita()
    {
        return array(
            'name' => 'any_name',
            'description' => 'any_description',
            'id' => 'any_id'
        );
    }

    public function testSholdBeAbleCreateNewCategoryReceita(): void
    {
        $this->getDependecies();
        $data = $this->createCategoryReceita();
        
        $newCategory = $this->categoryReceitasService->createNewCategory($data);
        $this->assertEquals($newCategory['status'], 201);
    }

    public function testSholdBeAbleFindCategoryById()
    {
        $this->getDependecies();
        $data = $this->createCategoryReceita();

        $new_category = $this->categoryReceitasService->createNewCategory($data);
        $categoryAlreadyExists = $this->categoryReceitasService->getCategoryById($data['id']);

        $this->assertEquals($new_category['data'], $categoryAlreadyExists['data']);
    }

    public function testSholdNotBeAbleFoundCategoryIfDoesNotExists()
    {
        $this->getDependecies();

        $data = $this->createCategoryReceita();
        $this->expectException(NotFoundExceptions::class);

        $this->categoryReceitasService->createNewCategory($data);
        $this->categoryReceitasService->getCategoryById('invalid_id');
    }
}
