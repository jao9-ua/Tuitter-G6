@extends('layouts.master')

@section('content')
<!-- Mostrar nombre de la categoría -->
<h1>#{{ $categoria->hashtag }}</h1>

<!-- Mostrar eventos en forma de tarjetas con carrusel -->
<div id="eventosCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach($eventos->chunk(3) as $chunk)
    <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
      <div class="row">
        @foreach($chunk as $evento)
        <div class="col-md-4">
          <div class="card">
            <img src="{{ asset('ruta/a/la/carpeta/de/imagenes/'.$evento->Imagen) }}" class="card-img-top" alt="Imagen del evento">
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
        <div class="col-md-2">
          @foreach($hilo->usuario as $usuario)
            <a href="{{ route('usuarios.show', $usuario->id) }}">
              <img src="{{ asset('ruta/a/la/carpeta/de/imagenes/'.$usuario->foto) }}" class="img-thumbnail" alt="Foto del usuario">
              <p>{{ $usuario->Nombre }}</p>
            </a>
          @endforeach
        </div>
        <div class="col-md-10">
          <div class="card">
            @if ($hilo->imagen)
              <img src="{{ asset('ruta/a/la/carpeta/de/imagenes/'.$hilo->imagen) }}" class="card-img-top" alt="Imagen del hilo">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $hilo->texto }}</h5>
            </div>
          </div>
        </div>
      </div>
    @endforeach

    {{ $hilos->links() }}
  @endif
</div>


@endsection
