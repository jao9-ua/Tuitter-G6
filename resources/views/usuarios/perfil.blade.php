@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Perfil de Usuario</h1>

    <!-- Información del usuario -->
    <div class="row">
        <div class="col-md-4">
            <img src="{{ $usuario->foto }}" alt="Foto de perfil" class="img-fluid">
            <h3>{{ $usuario->Nombre }}</h3>
            <p>{{ $usuario->biografia }}</p>
        </div>
    </div>

    <!-- Botones de navegación -->
    <div class="row mt-4">
        <div class="col-md-4">
            <button class="btn btn-primary btn-block" onclick="showHilos()">Ver Hilos</button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary btn-block" onclick="showCategorias()">Ver Categorías</button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary btn-block" onclick="showEventos()">Ver Eventos</button>
        </div>
    </div>

    <!-- Sección de Hilos -->
    <div id="hilos" style="display: none;">
        <h2 class="mt-4">Hilos escritos por {{ $usuario->Nombre }}</h2>
        <div class="row">
            @forelse ($usuario->hilos as $hilo)
                <div class="col-md-4">
                    <div class="card shadow">
                        <img src="{{ asset($hilo->imagen) }}" alt="Imagen del hilo" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $hilo->texto }}</h5>
                        </div>
                    </div>
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
        <h2 class="mt-4">Categorías a las que está suscrito {{ $usuario->Nombre }}</h2>
        <div class="row">
            @forelse ($usuario->categorias as $categoria)
                <div class="col-md-4">
                    <div class="card shadow">
                        <img src="{{ asset($categoria->imagen) }}" alt="Imagen de la categoría" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $categoria->hashtag }}</h5>
                            <p class="card-text">Vistas: {{ $categoria->views }}</p>
                        </div>
                    </div>
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
                        <img src="{{ asset($evento->Imagen) }}" alt="Imagen del evento" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">{{ $evento->Texto }}</h5>
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