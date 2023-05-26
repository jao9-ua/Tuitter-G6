@extends('layouts.master')

@section('content')
<style>
    /* Estilos personalizados */
    .container {
        max-width: 900px;
        margin: 0 auto;
    }

    h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 40px;
        text-align: center;
    }

    .input-group {
        display: flex;
        margin-bottom: 20px;
    }

    .form-control {
        flex: 1;
        padding: 10px;
        border-radius: 5px 0 0 5px;
        border-right: none;
    }

    .btn-primary {
        border-radius: 0 5px 5px 0;
    }

    .row {
        margin: 0 -15px;
    }

    .col-md-4 {
        padding: 0 15px;
    }

    .card {
        border: none;
        background-color: #f9f9f9;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-img-top {
        border-radius: 5px 5px 0 0;
    }

    .card-title {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 15px;
        text-align: center;
    }

    .card-text {
        color: #777;
        margin-bottom: 10px;
    }

    .btn-primary.custom {
        background-color: transparent;
        border-color: transparent;
        color: #333;
        transition: background-color 0.3s ease;
    }

    .btn-primary.custom:hover {
        background-color: #72bb53;
        border-color: #72bb53;
        color: #fff;
    }

    .btn-primary.custom:focus {
        box-shadow: none;
    }

.user-profile {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

.user-profile:hover {
    transform: translateY(-5px);
}

.card-img-top {
    object-fit: cover;
    height: 300px;
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
}

.user-bio {
    padding: 20px;
}

.user-bio-title {
    font-size: 24px;
    margin-bottom: 10px;
}

    </style>
<div class="container">
    @if (auth()->user()->id != $usuario->id)
    <h1>Perfil de {{$usuario->Nombre}}</h1>
    @else
    <h1>Perfil</h1>
    @endif
    <!-- Información del usuario -->
    <div class="row">
        <div class="col-md-4">
            <div class="card user-profile">
                <img src="{{ asset($usuario->foto) }}" alt="Foto de perfil" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $usuario->Nombre }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="user-bio">
                <h3 class="user-bio-title">{{ $usuario->biografia }}</h3>
            </div>
        </div>
    </div>




    <!-- Botones de navegación -->
    <div class="row mt-4">
        <div class="col-md-4">
            <button class="btn btn-primary btn-block"
                    style="background-color: transparent; border-color: transparent; color: #333;"
                    onclick="showHilos()">Ver Hilos
            </button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary btn-block"
                    style="background-color: transparent; border-color: transparent; color: #333;"
                    onclick="showCategorias()">Ver Categorías
            </button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary btn-block"
                    style="background-color: transparent; border-color: transparent; color: #333;"
                    onclick="showEventos()">Ver Eventos
            </button>
        </div>
    </div>
    <!-- Botones de creación -->
    @if (auth()->user()->id == $usuario->id)
        <div class="row mt-4">
            <div class="col-md-4">
                <a href="{{ route('hilo.crear') }}" class="btn btn-primary btn-block">Crear Hilo</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('categorias.crear') }}" class="btn btn-primary btn-block">Crear Categoría</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('eventos.crear') }}" class="btn btn-primary btn-block">Crear Evento</a>
            </div>
        </div>
    @endif

    <!-- Sección de Hilos -->
    <div id="hilos" style="display: none;">
        <h2 class="mt-4">Hilos de {{ $usuario->Nombre }}</h2>
        <div class="row">
            @forelse ($usuario->hilos as $hilo)
                <div class="col-md-4">
                    <a href="{{ route('hilos.show', ['id' => $hilo->id]) }}">
                        <div class="card shadow">
                            <img src="{{ asset($hilo->imagen) }}" alt="Imagen del hilo" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $hilo->texto }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-md-12">
                    <p>No se encontraron hilos escritos por {{ $usuario->Nombre }}.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Sección de Categorías -->
    <div id="categorias" style="display: none;">
        <h2 class="mt-4">Categorías suscritas</h2>
        <div class="row">
            @forelse ($usuario->categorias as $categoria)
                <div class="col-md-4">
                    <a href="{{ route('categoria.mostrar', ['id' => $categoria->id]) }}">
                        <div class="card shadow">
                            <img src="{{ asset($categoria->imagen) }}" alt="Imagen de la categoría" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $categoria->hashtag }}</h5>
                                <p class="card-text">Vistas: {{ $categoria->views }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-md-12">
                    <p>{{ $usuario->Nombre }} no está suscrito a ninguna categoría.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Sección de Eventos -->
    <div id="eventos" style="display: none;">
        <h2 class="mt-4">Eventos creados por {{ $usuario->Nombre }}</h2>
        <div class="row">
            @forelse ($usuario->eventos as $evento)
                <div class="col-md-4">
                    <div class="card shadow">
                        <img src="{{ asset($evento->imagen) }}" alt="Imagen del evento" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">{{ $evento->texto }}</h5>
                            <p class="card-text"> Fin: {{$evento->fecha_fin }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p>No se encontraron eventos creados por {{ $usuario->Nombre }}.</p>
                </div>
            @endforelse
        </div>
    </div>
    <!-- Botón de Cerrar Sesión -->
    @auth
    <div class="row mt-4">
    @if (auth()->user()->id == $usuario->id)
        <div class="col-md-12 text-center">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
            </form>
        </div>
    @endif
    </div>
    @endauth
</div>

<script>
    function showHilos() {
        document.getElementById('hilos').style.display = 'block';
        document.getElementById('categorias').style.display = 'none';
        document.getElementById('eventos').style.display = 'none';
    }

    function showCategorias() {
        document.getElementById('hilos').style.display = 'none';
        document.getElementById('categorias').style.display = 'block';
        document.getElementById('eventos').style.display = 'none';
    }

    function showEventos() {
        document.getElementById('hilos').style.display = 'none';
        document.getElementById('categorias').style.display = 'none';
        document.getElementById('eventos').style.display = 'block';
    }
</script>
@endsection
