<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'autor', 'genero', 'ano_de_publicacion'];

    protected $casts = [
        'ano_de_publicacion' => 'integer',
    ];

    
}
