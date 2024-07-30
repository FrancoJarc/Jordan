<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_Compra extends Model
{
    use HasFactory;
    
    protected $table = 'users_compras'; 

    protected $fillable = [
        'carritos_id',
        'users_id',
        'total',
    ];
}
