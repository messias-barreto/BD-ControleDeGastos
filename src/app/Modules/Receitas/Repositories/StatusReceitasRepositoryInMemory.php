<?php

namespace App\Modules\Receitas\Repositories;

use App\Modules\Receitas\Contracts\IStatusReceitasRepository;

class StatusReceitasRepositoryInMemory implements IStatusReceitasRepository
{

    private $status = array();

    public function create($request)
    {
        array_push($this->status, $request);     
        return end($this->status);
    }

    public function getAllStatusReceitas()
    {
        return $this->status;
    }

    public function getStatusReceitasById($id)
    {
        foreach($this->status as $s) {
            if($s['id'] == $id){
                return $s;
            }

            return null;
        }
    }

    public function getStatusReceitasByName($name)
    {
        foreach($this->status as $s) {
            if($s['name'] == $name){
                return $s;
            }

            return null;
        }
    }
}