<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Producto;

class VisitanteController extends Controller
{
    public function index()
    {
        $productos = Producto::where('is_visible', true)->get();
        return view('visitantes.index', compact('productos'));
    }
}
