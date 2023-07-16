<?php

namespace App\Modules\Receitas\Repositories;

use App\Modules\Receitas\Contracts\IReceitasRepository;

class ReceitasRepositoryInMemory implements IReceitasRepository
{
    private $receitas = array();

    public function create($receita)
    {
        array_push($this->receitas, $receita);     
        return end($this->receitas);      
    }

    public function getReceitasByUserId($user_id)
    {
        $usersReceitas = array();

        foreach($this->receitas as $receita) {
            if($receita['user_id'] == $user_id) {
                array_push($usersReceitas, $receita);
            }

            return $usersReceitas;
        }
    }

    public function getReceitaById($id)
    {
        foreach($this->receitas as $receita) {
            if($receita['id'] == $id){
                return $receita;
            }

            return null;
        }
    }
}