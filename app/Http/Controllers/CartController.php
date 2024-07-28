<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;


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
        return view('carrito.show', compact('cart'));
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
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect()->back()->with('message', 'Producto eliminado del carrito');
    }

    public function destroy()
    {
        session()->forget('cart');
        return redirect()->back()->with('message', 'Carrito vaciado');
    }

}
