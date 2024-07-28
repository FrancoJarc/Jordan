<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_Compra extends Model
{
    use HasFactory;
    
    protected $table = 'users_compras'; 

    protected $fillable = [
        'id_carrito',
        'id_cliente',
        'total',
    ];
}
