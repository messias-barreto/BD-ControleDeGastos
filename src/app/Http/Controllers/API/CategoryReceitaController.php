<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryReceitasRequest;
use App\Modules\Receitas\Repositories\Eloquent\CategoryReceitasRepository;
use App\Modules\Receitas\Services\CategoryReceitasService;
use Illuminate\Http\Request;

class CategoryReceitaController extends Controller
{
    private $categoryReceitasRepository;
    private $categoryReceitasServices;

    public function __construct()
    {
        $this->categoryReceitasRepository = app(CategoryReceitasRepository::class);
        $this->categoryReceitasServices = new CategoryReceitasService($this->categoryReceitasRepository);
    }

    public function index()
    {
        $categories = $this->categoryReceitasServices->getAllCategories();
        return response()->json($categories, $categories['status']);
    }

    public function store(CategoryReceitasRequest $request)
    {
        $category = $this->categoryReceitasServices->createNewCategory($request->all());
        return response()->json($category, $category['status']);
    }

    public function find($id)
    {

    }
}
