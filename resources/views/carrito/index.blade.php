@extends('layouts.base')

@section('Titulo', 'Inicio')
@section('description', 'Bienvenido a la página de inicio de Jordan.')
@section('keywords', 'Jordan, Zapatillas, Nike, Inicio, Sneakers')
@section('autor', 'Jordan')

@section('content')

<h1 class="titulo"> PRODUCTOS</h1>

@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<div class="container">
    <div class="row">

        @foreach ($productos as $producto)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="jordan-card">

                <img src="{{ Storage::url($producto->imagen1) }}" alt="{{ $producto->name }}" class="jordan-card-img-top">
                <div class="jordan-card-body text-center">
                    <h2 class="jordan-producto-name">{{ $producto->name }}</h2>
                    <p class="jordan-producto-precio">${{ $producto->precio }}</p>
                    <form action="{{ route('carrito.add') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                        <button type="submit" class="btn btn-dark">Agregar al Carrito</button>
                    </form>
                </div>
                
            </div>
        </div>
        @endforeach

    </div>
</div>

</div>












@endsection