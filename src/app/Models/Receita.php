<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'valor',
        'data',
        'user_id',
        'category_id'
    ];

    protected $guarded = [
        'id',
        'user_id',
        'category_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
