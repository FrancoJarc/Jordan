@extends('layouts.base')

@section('Titulo', 'Inicio')
@section('description', 'Bienvenido a la página de inicio de Jordan.')
@section('keywords', 'Jordan, Zapatillas, Nike, Inicio, Sneakers')
@section('autor', 'Jordan')

@section('content')

<h1>Bienvenido a Jordan APP USUARIO</h1>
<p>Compra tus zapatillas favoritas aquí.</p>

<h1 class="titulo-productos"> PRODUCTOS</h1>

@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        @foreach ($productos as $producto)
        <div class="col-3">
            <div class="card">
                <img src="{{ Storage::url($producto->imagen1) }}" alt="{{$producto->name }}" class="card-img-" >
                <div class="card-body text-center">
                    <h2 class="producto-name">{{$producto->name}}</h2>
                    <p class="producto-precio">${{$producto->precio}}</p>

                    <form action="{{ route('carrito.add')}}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                        <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                    </form>

                </div>
            </div>

        </div>
        @endforeach


    </div>

</div>












@endsection