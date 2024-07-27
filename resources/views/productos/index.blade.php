@extends('layouts.base')

@section('Titulo', 'Inicio')
@section('description', 'Bienvenido a la página de inicio de Jordan.')
@section('keywords', 'Jordan, Zapatillas, Nike, Inicio, Sneakers')
@section('autor', 'Jordan')

@section('content')
<h1>Bienvenido a Jordan APP</h1>
<p>Compra tus zapatillas favoritas aquí.</p>

<table class="table">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear producto</a>
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Subtitulo</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    @foreach($productos as $producto)
    <tbody>
        <tr>
            <td>{{$producto->name}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>{{$producto->precio}}</td>
            <td>{{$producto->subtitulo}}</td>
            <td><a href="{{ route('productos.show',$producto) }}" class="btn btn-primary">Ver</a></td>
            <td><a href="{{ route('productos.edit',$producto) }}" class="btn btn-primary">Editar</a></td>
            <form action="{{route('productos.destroy',$producto)}}" method="POST">
                @csrf
                @method('DELETE')
                <td><button type="submit" class="btn btn-danger">Eliminar</button></td>
            </form>

        </tr>

    </tbody>
    @endforeach
</table>
@endsection