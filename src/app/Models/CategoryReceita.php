<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryReceita extends Model
{
    use HasFactory;
    protected $table = "category_receitas";
    protected $fillable = [
        'name',
        'description',
    ];
}
