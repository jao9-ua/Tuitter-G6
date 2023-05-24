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
        
.pagination {
  display: flex;
  justify-content: center;
  align-items: center;
}

.pagination .pagination-link {
  margin: 0 5px;
  font-size: 14px; /* Ajusta el tamaño de la fuente de los números de página */
}

.pagination .pagination-link,
.pagination .disabled {
  color: #ff2929;
  text-decoration: none;
}

.pagination .pagination-link:hover {
  text-decoration: underline;
}

.pagination .disabled {
  cursor: default;
}

.pagination .pagination-link.active {
  font-weight: bold;
}

.pagination .pagination-arrow {
  font-size: 14px; /* Ajusta el tamaño de la fuente de las flechas */
  color: #333;
  text-decoration: none;
}

.pagination .pagination-arrow:hover {
  text-decoration: none;
}

.pagination .pagination-arrow.disabled {
  color: #ccc;
  cursor: default;
}

.pagination .pagination-info {
  margin: 0 10px;
  font-size: 14px; /* Ajusta el tamaño de la fuente del texto de información */
  color: #555;
}
.pagination .pagination-link.previous,
.pagination .pagination-link.next {
  display: none;
}

.pagination .pagination-info {
  display: none;
}
.flex .justify-between {
  display: none;
}
.relative .w-5 .h-5 {
  size: 6px; /* Ajusta el tamaño de la fuente de las flechas */

}
.pagination .icon .text-sm .text-gray-700 .leading-5{
  display: none;
}
.icon {
  width: 30px; /* Ajusta el ancho del ícono */
  height: 20px; /* Ajusta la altura del ícono */
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
            <div class="card-img-container" style="background-image: url('{{ asset('images/'.$evento->imagen) }}')" alt="Imagen no disponible"></div>
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
          @if($hilo->usuario)
            <a href="{{ route('usuarios.show', $hilo->usuario->id) }}">
              <div class="card-img-container" style="background-image: url('{{ asset('images/'.$hilo->usuario->foto)}}')" alt = "Imagen usuario"></div>
              <p>{{ $hilo->usuario->Nombre }}</p>
            </a>
          @endif
        </div>
        <div class="col-md-10">
          <div class="card">
            @if ($hilo->imagen)
              <img src="{{ asset('images/'.$hilo->imagen) }}" class="card-img-top" alt="Imagen del hilo">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $hilo->texto }}</h5>
            </div>
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
