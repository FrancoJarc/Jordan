<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = ['name', 'precio', 'descripcion','subtitulo','is_visible','imagen1', 'imagen2', 'imagen3'];
}
