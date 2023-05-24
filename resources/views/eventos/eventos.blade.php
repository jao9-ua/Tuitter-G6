@extends('layouts.master')

@section('content')
<style> 
    .navigation {
        padding: 10px;
    }

    .navigation-links {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    .navigation-link {
        margin-right: 10px;
    }

    .navigation-link button {
        color: #333;
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        background-color: transparent;
        border: none;
        outline: none;
    }

    .navigation-link button.btn-active {
        background-color: #72bb53;
        color: #fff;
    }

    .navigation-link button:hover {
        background-color: #72bb53;
        color: #fff;
    }

</style>
<div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Eventos</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-4">
                    <div class="navigation">
                            <ul class="navigation-links">
                                <li class="navigation-link">
                                    <form action="{{ route('eventos.listar') }}" method="GET">
                                        <input type="hidden" name="activo" value="{{ $activo ? 'false' : 'true' }}">
                                        <input type="hidden" name="ordenarPorFecha" value="{{ $ordenarPorFecha ? 'true' : 'false' }}">
                                        <button type="submit" class="navigation-links btn btn-primary {{ $activo ? 'btn-active' : '' }}">{{ $activo ? 'Todos' : 'Activos' }}</button>
                                    </form>
                                </li>
                                <li class="navigation-link">
                                    <form action="{{ route('eventos.listar') }}" method="GET">
                                        <input type="hidden" name="activo" value="{{ $activo ? 'true' : 'false' }}">
                                        <input type="hidden" name="ordenarPorFecha" value="{{ $ordenarPorFecha ? 'false' : 'true' }}">
                                        <button type="submit" class="navigation-links btn btn-primary {{ $ordenarPorFecha ? 'btn-active' : '' }}">{{ $ordenarPorFecha ? 'Ordenar por fecha de inicio' : 'Deshabilitar orden' }}</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @foreach ($eventos as $evento)
                        @if (($activo && $evento->fecha_fin > now()) || !$activo)
                            <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                <h5 class="card-title">{{ $evento->texto }}</h5>
                                @if ($evento->categoria)
                                    <p class="card-text">
                                    #{{ $evento->categoria->hashtag }}
                                    </p>
                                @endif
                                @if ($evento->usuario)
                                    <div class="d-flex align-items-center mb-2">
                                    <img src="{{ asset('$evento->usuario->foto) }}" alt="Imagen del usuario" class="rounded-circle profile-picture mr-2" style="width: 40px; height: 40px;">
                                    <p class="mb-0"><strong>Usuario:</strong> {{ $evento->usuario->Nombre }}</p>
                                    </div>
                                @endif
                                @if ($evento->imagen)
                                    <img src="{{ asset($evento->imagen) }}" alt="Imagen del evento" class="img-fluid">
                                @endif
                                <p class="card-text"><strong>Inicio:</strong> {{ $evento->fecha_ini }}</p>
                                <p class="card-text"><strong>Fin:</strong> {{ $evento->fecha_fin }}</p>
                                </div>
                            </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection