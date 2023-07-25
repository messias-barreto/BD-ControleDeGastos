<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusReceitasRequest;
use App\Modules\Receitas\Repositories\Eloquent\StatusReceitasRepository;
use App\Modules\Receitas\Services\StatusReceitasService;
use Illuminate\Http\Request;

class StatusReceitasController extends Controller
{
    private $statusReceitasRepository;
    private $statusReceitasServices;

    public function __construct()
    {
        $this->statusReceitasRepository = app(StatusReceitasRepository::class);
        $this->statusReceitasServices = new StatusReceitasService($this->statusReceitasRepository);
    }

    public function store(StatusReceitasRequest $request)
    {
        $status = $this->statusReceitasServices->createANewStatus($request->all());
        return response()->json($status, $status['status']);
    }

    public function index()
    {
        $status = $this->statusReceitasServices->getAllStatus();
        return response()->json($status, $status['status']);
    }
}
