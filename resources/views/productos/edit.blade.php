@extends('layouts.base')

@section('Titulo', 'Editar')
@section('description', 'Pagina para editar un producto creado en Jordan.')
@section('keywords', 'Jordan, Zapatillas, Nike, Editar, Sneakers')
@section('autor', 'Jordan')

@section('content')




<form action="{{route('productos.update',$producto)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre',$producto->name)}}">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <textarea class="form-control" id="descripcion" name="descripcion" cols="30" rows="5">{{old('descripcion',$producto->descripcion)}}</textarea>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" value="{{old('precio',$producto->precio)}}">
    </div>
    <div class="mb-3">
        <label for="subtitulo" class="form-label">Subtitulo</label>
        <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="{{old('subtitulo',$producto->subtitulo)}}">
    </div>
    <div class="mb-3">
        <label for="imagen1" class="form-label">Imagen principal:</label>
        <input type="file" class="form-control" id="imagen1" name="imagen1">
    </div>
    <div class="mb-3">
        <label for="imagen2" class="form-label">Imagen secundaria 2:</label>
        <input type="file" class="form-control" id="imagen2" name="imagen2">
    </div>
    <div class="mb-3">
        <label for="imagen3" class="form-label">Imagen secundaria 3:</label>
        <input type="file" class="form-control" id="imagen3" name="imagen3">
    </div>

    <button type="submit" class="btn btn-primary">Editar</button>
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