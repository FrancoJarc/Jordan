@extends('layouts.base')

@section('Titulo', 'Inicio')
@section('description', 'Pagina para ver los datos de tu zapatilla de Jordan.')
@section('keywords', 'Jordan, Zapatillas, Nike, Show, Sneakers')
@section('autor', 'Jordan')

@section('content')
<h1>Bienvenido a Jordan APP</h1>
<p>Compra tus zapatillas favoritas aquí.</p>

<h2>{{$producto->name}}</h2>
<h2>{{$producto->descripcion}}</h2>
<h2>{{$producto->precio}}</h2>
<h2>{{$producto->subtitulo}}</h2>
<h2>{{$producto->name}}</h2>
<img src="{{ Storage::url($producto->imagen1) }}" alt="Imagen 1">
<img src="{{ Storage::url($producto->imagen2) }}" alt="Imagen 2">
<img src="{{ Storage::url($producto->imagen3) }}" alt="Imagen 3">

<a href="{{route('productos.index')}}" class="btn btn-dark">Volver</a>

@endsection