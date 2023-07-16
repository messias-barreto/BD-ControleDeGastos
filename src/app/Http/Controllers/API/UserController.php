<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Modules\Users\Repositories\Eloquent\UsersRepository;
use App\Modules\Users\Repositories\UsersRepositoryInMemory;
use App\Modules\Users\Services\UserService;

class UserController extends Controller
{
    private $userService;
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = app(UsersRepository::class);
        $this->userService = new UserService($this->userRepository);
    }

    public function store(UserRequest $request)
    {
        $user = $this->userService->createNewUser($request->all());
        return $user;
    }

    public function show($id)
    {
        $user = $this->userService->getOneUser($id);
        return response()->json($user, 200);
    }
}
