@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Eventos</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($eventos as $evento)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                @if ($evento->imagen)
                                    <img src="{{ asset('images/' . $evento->imagen) }}" alt="Imagen del evento" class="card-img-top img-fluid rounded">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $evento->texto }}</h5>
                                    @if ($evento->categoria)
                                        <p class="card-text">
                                            <strong>Categoría:</strong> #{{ $evento->categoria->hashtag }}
                                        </p>
                                    @endif
                                    @if ($evento->usuario)
                                        <div class="d-flex align-items-center mb-2">
                                            <img src="{{ asset('images/' . $evento->usuario->foto) }}" alt="Imagen del usuario" class="rounded-circle profile-picture mr-2" style="width: 40px; height: 40px;">
                                            <p class="mb-0"><strong>Usuario:</strong> {{ $evento->usuario->Nombre }}</p>
                                        </div>
                                    @endif
                                    <p class="card-text"><strong>Fecha de inicio:</strong> {{ $evento->fecha_ini}}</p>
                                    <p class="card-text"><strong>Fecha de fin:</strong> {{ $evento->fecha_fin }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
