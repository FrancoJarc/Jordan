<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $productos = Producto::where('is_visible',true)->get();
        return view('productos.index', compact('productos'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'subtitulo' => 'required',
            'imagen1' => 'file|mimes:jpg,jpeg,png',
            'imagen2' => 'file|mimes:jpg,jpeg,png',
            'imagen3' => 'file|mimes:jpg,jpeg,png'

        ]);

        $ruta1 = $request->file('imagen1')->store('public/imagenes');
        $ruta2 = $request->file('imagen2')->store('public/imagenes');
        $ruta3 = $request->file('imagen3')->store('public/imagenes');
        

        Producto::create([
            'name' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'subtitulo' => $request->subtitulo,
            'imagen1' => $ruta1,
            'imagen2' => $ruta2,
            'imagen3' => $ruta3
        ]);

        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', ['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', ['producto'=>$producto]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'subtitulo' => 'required',
            'imagen1' => 'nullable|file|mimes:jpg,jpeg,png',
            'imagen2' => 'nullable|file|mimes:jpg,jpeg,png',
            'imagen3' => 'nullable|file|mimes:jpg,jpeg,png'
        ]);



        if ($request->hasFile('imagen1')) {   

            if ($producto->imagen1 && Storage::exists($producto->imagen1)) {
                Storage::delete($producto->imagen1);
            }
            $producto->imagen1 = $request->file('imagen1')->store('public/imagenes');
        }

        if ($request->hasFile('imagen2')) {

            if ($producto->imagen2 && Storage::exists($producto->imagen2)) {
                Storage::delete($producto->imagen2);
            }
            $producto->imagen2 = $request->file('imagen2')->store('public/imagenes');
        }

        if ($request->hasFile('imagen3')) {

            if ($producto->imagen3 && Storage::exists($producto->imagen3)) {
                Storage::delete($producto->imagen3);
            }
            $producto->imagen3 = $request->file('imagen3')->store('public/imagenes');
        }

        $producto->update([
            'name' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'subtitulo' => $request->subtitulo,
            'imagen1' => $producto->imagen1,
            'imagen2' =>$producto->imagen2,
            'imagen3' =>$producto->imagen3,

        ]);



        return redirect()->route('productos.index')
        ->with("status", "El producto se ha modificado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->update([
            'is_visible'=>false
        ]);

        return redirect()->route('productos.index')
                         ->with("status", "El producto se ha eliminado correctamente");
    }
}
