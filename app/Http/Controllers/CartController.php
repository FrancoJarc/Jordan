<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use App\Models\Users_Compra;
use App\Models\Carrito;
use App\Models\Productos_Carrito;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {

        $productos = Producto::where('is_visible', true)->get();
        return view('carrito.index', compact('productos'));
    }


    public function add(Request $request)
    {
        $cart = session('cart', []);

        $productoId = $request->input('producto_id');
        $producto = Producto::find($productoId);

        if ($producto) {
            if (isset($cart[$productoId])) {
                // Si el producto ya está en el carrito, incrementar la cantidad
                $cart[$productoId]['cantidad']++;
            } else {
                // Si el producto no está en el carrito, añadirlo con cantidad 1
                $cart[$productoId] = [
                    'producto' => $producto,
                    'cantidad' => 1
                ];
            }
        }

        session(['cart' => $cart]);

        return redirect()->route('carrito.index')
        ->with("status", "El siguiente producto se ha añadido al carrito: ". $producto->name);
    }

    public function show()
    {
        $cart = session('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['producto']->precio * $item['cantidad'];
        }

        return view('carrito.show', compact('cart', 'total'));
    }

    public function update(Request $request, $id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session(['cart' => $cart]);
        }

        return redirect()->back()->with('message', 'Cantidad actualizada');
    }

    public function remove($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['cantidad'] > 1) {
                $cart[$id]['cantidad']--;
            } else {
                unset($cart[$id]);
            }

            session(['cart' => $cart]);
        }
        return redirect()->route('carrito.show')->with('message', 'Producto actualizado en el carrito');
    }



    public function comprar(Request $request)
    {
        $user = Auth::user();
        $total = $request->input('total');
        $cart = session('cart', []);
        
        $carrito = Carrito::create([
            'users_id' => $user->id,
            'estado' => "Completado",
        ]);

        $carritoId = $carrito->id;

        foreach ($cart as $item) {
            Productos_Carrito::create([
                'productos_id' => $item['producto']->id,
                'carritos_id' => $carritoId,
                'cantidad' => $item['cantidad'],
            ]);
        }

        Users_Compra::create([
            'carritos_id' => $carritoId,
            'users_id' => $user->id,
            'total' => $total,
        ]);

        session::forget('cart');

        return redirect()->route('carrito.show')->with('message', 'Compra realizada');
    }

}
