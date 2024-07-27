@extends('layouts.base')

@section('Titulo', 'Crear')
@section('description', 'Pagina para crear el producto en Jordan.')
@section('keywords', 'Jordan, Zapatillas, Nike, Crear, Sneakers')
@section('autor', 'Jordan')

@section('content')

<form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <textarea class="form-control" id="descripcion" name="descripcion" cols="30" rows="5">{{old('descripcion')}}</textarea>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" value="{{old('precio')}}">
    </div>
    <div class="mb-3">
        <label for="subtitulo" class="form-label">Subtitulo</label>
        <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="{{old('subtitulo')}}">
    </div>
    <div class="mb-3">
        <label for="imagen1" class="form-label">Imagen principal:</label>
        <input type="file" class="form-control" id="imagen1" name="imagen1" required>

    </div>
    <div class="mb-3">
        <label for="imagen2" class="form-label">Imagen secundaria 2:</label>
        <input type="file" class="form-control" id="imagen2" name="imagen2" required>
    </div>
    <div class="mb-3">
        <label for="imagen3" class="form-label">Imagen secundaria 3:</label>
        <input type="file" class="form-control" id="imagen3" name="imagen3" required>
    </div>

    <button type="submit" class="btn btn-primary">Subir</button>
    <a href="{{ route('productos.index') }}" class="btn btn-dark">Volver</a>


    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</form>

@endsection