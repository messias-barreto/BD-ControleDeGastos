<?php

namespace App\Modules\Receitas\Contracts;

interface IReceitasRepository {
    public function create($receita);
    public function getReceitaById($id);
    public function getReceitasByUserId($user_id);
}