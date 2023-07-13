<?php

namespace App\Modules\Users\Contracts;

use App\Http\Requests\UserRequest;

interface IUserRepository 
{
    public function getOneUser($user_id);
    public function createNewUser(UserRequest $request);
}