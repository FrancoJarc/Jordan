@extends('layouts.base')

@section('Titulo', 'Inicio')
@section('description', 'Pagina para ver el carrito de compra de Jordan.')
@section('keywords', 'Jordan, Zapatillas, Nike, Show,Carrito, Sneakers')
@section('autor', 'Jordan')

@section('content')
<h1 class="titulo">CARRITO DE COMPRA</h1>

<div class="contenedor-tabla">


    <table class="table">
        @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif

        @if (!empty($cart))
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Breve descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        @foreach($cart as $item)
        <tbody>
            <tr>
                <td>{{$item['producto']->name }}</td>
                <td>{{$item['producto']->subtitulo }}</td>
                <td>{{$item['producto']->precio }}</td>
                <td>{{$item['cantidad'] }}</td>
                <form action="{{route('carrito.remove', $item['producto']->id )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td><button type="submit" class="btn btn-danger">Eliminar</button></td>
                </form>

            </tr>

        </tbody>
        @endforeach

        @else
        <h1 class="titulo">No hay productos en el carrito.</h1>
        @endif

    </table>

    @if (!empty($cart))
    <h3 class="titulo">Total: ${{ $total }}</h3>

    <div class="form-btn-container d-flex justify-content-center align-items-center my-4">
        <form action="{{ route('carrito.comprar') }}" method="POST" class="me-2">
            @csrf
            <input type="hidden" name="total" value="{{ $total }}">
            <button type="submit" class="btn btn-primary">Comprar</button>
        </form>
        <a href="{{ route('carrito.index') }}" class="btn btn-dark">Volver</a>
    </div>

    @endif


</div>



@endsection