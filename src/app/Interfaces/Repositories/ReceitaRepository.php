<?php

namespace App\Interfaces\Repository;

interface ReceitaRepository 
{
    public function getAllUserReceitas($user_id);
    public function getOneReceita($receita_id);
    public function addNewReceita();
}