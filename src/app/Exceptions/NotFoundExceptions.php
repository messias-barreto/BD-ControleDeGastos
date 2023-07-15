<?php

namespace App\Exceptions;

use Exception;

class NotFoundExceptions extends Exception
{
    protected $message = 'Dado Não Encontrado!';
    protected $status = 400;

    public function render()
    {
        return response()->json(['message' => $this->message, 'status' => 400]);
    }
}
