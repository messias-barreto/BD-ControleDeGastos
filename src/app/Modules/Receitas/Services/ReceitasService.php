<?php

namespace App\Modules\Receitas\Services;

use App\Exceptions\NotFoundExceptions;
use App\Modules\Receitas\Contracts\ICategoryReceitasRepository;
use App\Modules\Receitas\Contracts\IReceitasRepository;
use App\Modules\Users\Contracts\IUserRepository;
use Exception;

class ReceitasService 
{
    private $repository;
    private $category;
    private $user;

    public function __construct(IReceitasRepository $receitasRepository,
                                ICategoryReceitasRepository $categoryReceitasRepository,
                                IUserRepository $userRepository)
    {
        $this->repository = $receitasRepository;
        $this->category = $categoryReceitasRepository;
        $this->user = $userRepository;
    }

    public function createNewReceita($receitas)
    {
        //Verifica se A Categoria Existe
        $categoryAlreadyExists = $this->category->getCategoryById($receitas['category_id']);
        if(empty($categoryAlreadyExists)) {
            return throw new NotFoundExceptions('Categoria Não foi Encontrada!', 400);
        }

        //Verficia se o Usuário Existe
        $userAlreadyExists = $this->user->getOneUser($receitas['user_id']);
        if(empty($userAlreadyExists)) {
            return throw new NotFoundExceptions('Usuário não foi Encontrado!', 400);
        }

        $newReceitas = $this->repository->create($receitas);
        if(empty($newReceitas)) {
            throw new Exception('Não foi Possível Cadastrar a nova Receita');
        }

        return ['data' => $newReceitas, 'message' => 'Receita foi Adicionada!', 'status' => 201];
    }

    public function getAllUsersReceitas($user_id)
    {
        $userAlreadyExists = $this->user->getOneUser($user_id);
        if(empty($userAlreadyExists)) {
            return throw new NotFoundExceptions('Usuário não foi Encontrado!', 400);
        }

        $receitas = $this->repository->getReceitasByUserId($user_id);
        if(empty($receitas)) {
            return throw new NotFoundExceptions('Nenhuma Receita Encontrada', 400);
        }

        return ['data' => $receitas, 'message' => 'Receita(s) Encontrada(s)!', 'status' => 200];
    }

    public function getReceitaById($id)
    {
        $receita = $this->repository->getReceitaById($id);
        if(empty($receita)) {
            return throw new NotFoundExceptions('Receita Não Encontrada', 400);
        }

        return ['data' => $receita, 'message' => 'Receita Encontrada!', 'status' => 200];
    }
}