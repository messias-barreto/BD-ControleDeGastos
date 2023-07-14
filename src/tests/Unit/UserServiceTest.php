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
    
    public function testSholdBeAbleGetUserById(): void
    {
        $this->getDependecies();
        $user = array(
            "name" => "Gabrielle Duarte",
            "email" => "gabrielle508@gmail.com",
            "password" =>"123123",
            "id" => 10
        );

        $this->userService->createNewUser($user);
        
        $usersAlreadyExists = $this->userService->getOneUser($user['id']);
        $this->assertEquals($user, $usersAlreadyExists['data']);
    }

    public function testSholdBeAbleCreateNewUser(): void
    {
        $this->getDependecies();
        $user = array(
            "name" => "Gabrielle Duarte",
            "email" => "gabrielle508@gmail.com",
            "password" =>"123123",
            "id" => 10
        );

        $newUser = $this->userService->createNewUser($user);
        $this->assertArrayHasKey('id', $newUser['data']);
    }

    public function testSholdNotBeAbleCreateNewUserIfEmailAlreadyExists(): void
    {
        $this->getDependecies();
        $user = array(
            "name" => "Any User",
            "email" => "any_email@gmail.com",
            "password" =>"any_password",
            "id" => 10
        );

        $user2 = array(
            "name" => "Any User",
            "email" => "any_email@gmail.com",
            "password" =>"any_password",
            "id" => 10
        );

        $newUser = $this->userService->createNewUser($user);
        $this->assertNotEquals($user, $newUser);
    }
}
