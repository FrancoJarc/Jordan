@extends('layouts.base')

@section('Titulo', 'Inicio')
@section('description', 'Pagina para ver los datos de tu zapatilla de Jordan.')
@section('keywords', 'Jordan, Zapatillas, Nike, Show, Sneakers')
@section('autor', 'Jordan')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div id="productImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ Storage::url($producto->imagen1) }}" class="d-block w-100" alt="Imagen 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ Storage::url($producto->imagen2) }}" class="d-block w-100" alt="Imagen 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ Storage::url($producto->imagen3) }}" class="d-block w-100" alt="Imagen 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productImagesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productImagesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <h1 class="display-4">{{$producto->name}}</h1>
            <h3 class="text-muted">{{$producto->subtitulo}}</h3>
            <p class="lead">{{$producto->descripcion}}</p>
            <h3 class="text-success">${{$producto->precio}}</h3>
            <div class="mt-4">
                <a href="{{route('productos.index')}}" class="btn btn-dark">Volver</a>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h3>Comentarios</h3>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuario 1</h5>
                    <p class="card-text">¡Gran producto! Me encantó.</p>
                </div>
            </div>
            <div class="card comentarios">
                <div class="card-body">
                    <h5 class="card-title">Usuario 2</h5>
                    <p class="card-text">Muy cómodo y de buena calidad.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection