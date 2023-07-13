<?php 

namespace App\Modules\Users\Repositories\Eloquent;

use App\Models\User;
use App\Modules\Users\Contracts\IUserRepository;

class UsersRepository implements IUserRepository {
    protected $user;

    public function __construct()
    {
        $this->user = app(User::class);
    }

    function createNewUser($user)
    {
        $newUser = $this->user->create($user);
        return $newUser;
    }

    function getOneUser($user_id)
    {
        return $user = $this->user->find($user_id);
    }
}