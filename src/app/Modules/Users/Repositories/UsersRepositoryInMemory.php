<?php 

namespace App\Modules\Users\Repositories;
use App\Modules\Users\Contracts\IUserRepository;

class UsersRepositoryInMemory implements IUserRepository {
    protected $user = array();

    public function createNewUser($request)
    {
        array_push($this->user, $request);
        return end($this->user);
    }

    public function getOneUser($user_id)
    {
        foreach ($this->user as $element ) {
            if ($element['id'] == $user_id) {
                return $element;
            }
        }    

        return null;
    }

    public function getOneUserByEmail($email)
    {
        foreach ($this->user as $element ) {
            if ($element['email'] == $email) {
                return $element;
            }
        }    

        return null;
    }
    
}