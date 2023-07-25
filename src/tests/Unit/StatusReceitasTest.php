<?php

namespace Tests\Unit;

use App\Modules\Receitas\Repositories\StatusReceitasRepositoryInMemory;
use App\Modules\Receitas\Services\StatusReceitasService;
use PHPUnit\Framework\TestCase;

class StatusReceitasTest extends TestCase
{
    private $statusReceitasRepositoryInMemory;
    private $statusReceitasService;

    public function getDependecies()
    {
        $this->statusReceitasRepositoryInMemory = app(StatusReceitasRepositoryInMemory::class);
        $this->statusReceitasService = new StatusReceitasService($this->statusReceitasRepositoryInMemory);
    }

     public function createStatus()
     {        
         return  array(
            'name' => 'any_name',
            'description' => 'any_description',
         );
     }

    public function testSholdBeAbleCreateANewStatus(): void
    {
        $this->getDependecies();
        $newStatus = $this->createStatus();

        $status = $this->statusReceitasService->createANewStatus($newStatus);
        $this->assertEquals($status['status'], 201);
    }
}
