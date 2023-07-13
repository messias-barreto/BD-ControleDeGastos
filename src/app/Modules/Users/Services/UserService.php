<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\Repositories\Eloquent\UsersRepository;
use Error;

class UserService {
    private $repository;

    public function __construct(UsersRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function createNewUser($user)
    {
        $user = $this->repository->createNewUser($user->all());
        if(empty($user)) {
            throw new Error('Não foi Possível Cadastrar o Usuário!', 400);
        }

        return ['data' => $user, 'message' => 'Usuário Cadastrado!', 'status' => 201];
    }

    public function getOneUser($user_id)
    {
        $user = $this->repository->getOneUser($user_id);
        return $user;
    }
}