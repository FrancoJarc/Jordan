@extends('layouts.base')

@section('Titulo', 'Inicio')
@section('description', 'Pagina para ver el carrito de compra de Jordan.')
@section('keywords', 'Jordan, Zapatillas, Nike, Show,Carrito, Sneakers')
@section('autor', 'Jordan')

@section('content')
<h1>Bienvenido a Jordan APP</h1>
<p>Compra tus zapatillas favoritas aquí.</p>

{{--
@if (!empty($cart))
<ul>
    @foreach($cart as $item)
    <li>{{ $item['producto']->name }}</li>
@endforeach
</ul>
@else
<p>No hay productos en el carrito.</p>
@endif
--}}
@endsection