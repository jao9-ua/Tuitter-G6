@extends('layouts.master')

@section('content')
<!-- Mostrar nombre de la categoría -->
<h1>#{{ $categoria->hashtag }}</h1>

<!-- Agrega tu código CSS personalizado aquí -->
<style>
    .card-img-container {
        width: 100%;
        height: 200px; /* Tamaño máximo de la imagen */
        background-size: cover; /* Hace que la imagen se encoja proporcionalmente y cubra todo el contenedor */
        background-position: center; /* Centra la imagen dentro del contenedor */
        background-repeat: no-repeat;
    }

    .card-img-container img {
        object-fit: cover; /* Ajusta la imagen dentro del espacio disponible */
        width: 100%;
        height: 100%;
    }

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<!-- Mostrar eventos en forma de tarjetas con carrusel -->
<div id="eventosCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($eventos->chunk(3) as $chunk)
        <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
            <div class="row">
                @foreach($chunk as $evento)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img-container" style="background-image: url('{{ asset($evento->imagen) }}')" alt="Imagen no disponible"></div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $evento->fecha_ini }}</h5>
                            <p class="card-text">{{ $evento->texto }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#eventosCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#eventosCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>

<!-- Mostrar hilos por páginas de 10 en 10 -->
<div class="mt-4">
    @if(isset($hilos))
    @foreach($hilos as $hilo)
    <div class="row">
        <div class="col-md-2">s
            @if($hilo->usuario)
            <a href="{{ route('usuario.perfil', $hilo->usuario->id) }}" style="text-decoration: none; color: #000;">
                <div class="card-img-container" style="background-image: url('{{ asset($hilo->usuario->foto) }}')" alt="Imagen usuario"></div>
                <p>{{ $hilo->usuario->Nombre }}</p>
            </a>
            @endif
        </div>
        <div class="col-md-10">

                <div class="card">
                    @if ($hilo->imagen)
                    <img src="{{ asset($hilo->imagen) }}" class="card-img-top" alt="Imagen del hilo" style="object-fit: cover; width: 100%; height: 200px;">
                    @endif
                    <a href="{{ route('hilos.show', $hilo->id) }}" style="text-decoration: none; color: #000;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $hilo->texto }}</h5>
                        </div>
                    </a>


                </div>
        </div>
    </div>
    @endforeach

    <div class="pagination">
        {{ $hilos->links() }}
    </div>
    @endif
</div>

@endsection

