<?php 

namespace App\Modules\Receitas\Contracts;

interface IStatusReceitasRepository 
{
    public function create($request);
    public function getAllStatusReceitas();
    public function getStatusReceitasById($id);
    public function getStatusReceitasByName($name);
}