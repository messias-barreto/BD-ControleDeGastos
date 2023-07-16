<?php

namespace Tests\Unit;

use App\Modules\Users\Repositories\UsersRepositoryInMemory;
use App\Modules\Users\Services\UserService;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    private $userRepositoryInMemory;
    private $userService;

    public function getDependecies()
    {
        $this->userRepositoryInMemory = new UsersRepositoryInMemory();
        $this->userService = new UserService($this->userRepositoryInMemory);
    }

    public function createUser()
    {
        return array(
            "name" => "any_name",
            "email" => "any_email",
            "password" => "any_password",
            "id" => 'any_id'
        );
    }

    public function testSholdBeAbleGetUserById(): void
    {
        $this->getDependecies();
        $user = $this->createUser();

        $this->userService->createNewUser($user);
        $usersAlreadyExists = $this->userService->getOneUser($user['id']);
        $this->assertEquals($user, $usersAlreadyExists['data']);
    }

    public function testSholdBeAbleCreateNewUser(): void
    {
        $this->getDependecies();
        $user = $this->createUser();

        $newUser = $this->userService->createNewUser($user);
        $this->assertArrayHasKey('id', $newUser['data']);
    }
}
