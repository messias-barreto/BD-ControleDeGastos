<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\Contracts\IUserRepository;
use Exception;

class UserService {
    private $repository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function createNewUser($user)
    {
        $user = $this->repository->createNewUser($user);
        if(empty($user)) {
            throw new Exception('Não foi Possível Cadastrar o Usuário!', 400);
        }

        return ['data' => $user, 'message' => 'Usuário Cadastrado!', 'status' => 201];
    }

    public function getOneUser($user_id)
    {
        $user = $this->repository->getOneUser($user_id);
        if(empty($user)) {
            return ['data' => $user, 'message' => 'Usuário Não Encontrado!', 'status' => 400];
        }

        return ['data' => $user, 'message' => 'Usuário Encontrado!', 'status' => 200];
    }
}