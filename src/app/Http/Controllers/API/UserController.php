<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Modules\Users\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = app(UserService::class);
    }

    public function create(UserRequest $request)
    {
        $user = $this->userService->createNewUser($request);
        return $user;
    }

    public function find($id)
    {
        $user = $this->userService->getOneUser($id);
        return response()->json($user, 200);
    }

}
