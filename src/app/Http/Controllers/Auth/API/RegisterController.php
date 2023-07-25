<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Modules\Users\Repositories\Eloquent\UsersRepository;
use App\Modules\Users\Services\UserService;

class RegisterController extends Controller
{
    private $userService;
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = app(UsersRepository::class);
        $this->userService = new UserService($this->userRepository);
    }

    public function register(UserRequest $request)
    {
        $user = $this->userService->createNewUser($request->all());
        return response()->json($user, $user['status']);
    }
}
