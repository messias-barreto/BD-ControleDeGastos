<?php

namespace Tests\Unit;

use App\Exceptions\NotFoundExceptions;
use App\Modules\Receitas\Repositories\CategoryReceitasRepositoryInMemory;
use App\Modules\Receitas\Repositories\ReceitasRepositoryInMemory;
use App\Modules\Receitas\Services\ReceitasService;
use App\Modules\Users\Repositories\UsersRepositoryInMemory;
use PHPUnit\Framework\TestCase;

class ReceitaServiceTest extends TestCase
{
    private $receitasRepositoryInMemory;
    private $categoryReceitasInMemory;
    private $userRepositoryInMemory;
    private $receitasService;

    public function getDependecies()
    {
        $this->receitasRepositoryInMemory = app(ReceitasRepositoryInMemory::class);
        $this->categoryReceitasInMemory = app(CategoryReceitasRepositoryInMemory::class);
        $this->userRepositoryInMemory = app(UsersRepositoryInMemory::class);

        $this->receitasService = new ReceitasService(
                                    $this->receitasRepositoryInMemory,
                                    $this->categoryReceitasInMemory,
                                    $this->userRepositoryInMemory
                                );

    
        
    }

    public function createCategory()
    {
        return  array(
            'name' => 'any_valor',
            'description' => 'any_description',
            'id' => 'any_category_id'
        );
    }

    public function createUser()
    {
        return array(
            "name" => "any_name",
            "email" => "any_email",
            "password" => "any_password",
            "id" => 'any_user_id'
        );
    }

    public function createReceita()
    {        
        return  array(
            'description' => 'any_description',
            'valor' => 'any_valor',
            'data' => 'any_data',
            'user_id' => 'any_user_id',
            'category_id' => 'any_category_id',
            'id' => 'any_id'
        );
    }

    public function testSholdBeAbleToAddNewReceita(): void
    {
        $this->getDependecies();
        $data = $this->createReceita();
        $category = $this->createCategory();
        $user = $this->createUser();

        $this->categoryReceitasInMemory->createNewCategory($category);
        $this->userRepositoryInMemory->createNewUser($user);
        $newData = $this->receitasService->createNewReceita($data);
        $this->assertEquals($newData['status'], 201);
    }

    public function testSholdNotBeAbleToAddNewReceitaIfUserDoesNotExists(): void
    {
        $this->getDependecies();
        $data = $this->createReceita();
        $category = $this->createCategory();

        $this->expectException(NotFoundExceptions::class);      
        $this->expectExceptionMessage('Usuário não foi Encontrado!');  

        $this->categoryReceitasInMemory->createNewCategory($category);
        $this->receitasService->createNewReceita($data);
    }

    public function testSholdNotBeAbleToAddNewReceitaIfCategoryDoesNotExists(): void
    {
        $this->getDependecies();
        $data = $this->createReceita();
        $user = $this->createUser();

        $this->expectException(NotFoundExceptions::class);      
        $this->expectExceptionMessage('Categoria Não foi Encontrada!');  
        $this->userRepositoryInMemory->createNewUser($user);
        $this->receitasService->createNewReceita($data);
    }

    public function testSholdBeAbleGetAllUserReceitas()
    {
        $this->getDependecies();
        $data = $this->createReceita();
        $user = $this->createUser();

        $this->userRepositoryInMemory->createNewUser($user);

        $this->receitasRepositoryInMemory->create($data);
        $receitas = $this->receitasService->getAllUsersReceitas($user['id']);  
        $this->assertEquals($receitas['status'], 200);
    }

    public function testSholdNotBeAbleGetAllUserReceitasIfUserDontExists()
    {
        $this->getDependecies();
        $data = $this->createReceita();

        $this->receitasRepositoryInMemory->create($data);
        $this->expectException(NotFoundExceptions::class);
        $this->receitasService->getAllUsersReceitas('invalid_user');  
    }

    public function testSholdBeAbleGetReceitaById()
    {
        $this->getDependecies();
        $data = $this->createReceita();

        $this->receitasRepositoryInMemory->create($data);
        $receita = $this->receitasService->getReceitaById($data['id']);
        $this->assertEquals($receita['data'], $data);
    }

    public function testSholdNotBeAbleGetReceitaIfDoesNotExists()
    {
        $this->getDependecies();
        $data = $this->createReceita();

        $this->receitasRepositoryInMemory->create($data);
        $this->expectException(NotFoundExceptions::class);

        $this->receitasService->getReceitaById('invalid_id');
    }
}
