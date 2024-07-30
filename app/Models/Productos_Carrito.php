<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos_Carrito extends Model
{
    use HasFactory;

    protected $table = 'productos__carritos';

    protected $fillable = [
        'carritos_id',
        'productos_id',
        'cantidad',
    ];
}
