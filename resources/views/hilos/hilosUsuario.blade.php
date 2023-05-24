@extends('layouts.master')

@section('content')
    <div class="container">
        <style> 
            .profile-picture {
                text-align: center;
            }

            .profile-picture img {
                width: 100px;
                height: 100px;
                object-fit: cover;
                border-radius: 50%;
            }

            .no-profile-picture {
                text-align: center;
                color: gray;
                font-style: italic;
            }

            .card {
                box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
            }

            .card:hover {
                transform: translateY(-5px);
            }

            .card-link {
                color: inherit;
                text-decoration: none;
            }

            .card-link:hover {
                text-decoration: none;
            }
            .card-footer {
                background-color: #f8f9fa;
                border-top: 1px solid #dee2e6;
            }

            .card-footer-item {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-grow: 1;
                padding: 8px 0;
            }

            .card-footer-item i {
                margin-right: 4px;
            }

            .card-footer-item span {
                font-size: 14px;
                font-weight: bold;
            }
            .like-button {
                display: flex;
                align-items: center;
                background: none;
                border: none;
                cursor: pointer;
                color: #ccc;
                transition: color 0.3s ease;
            }

            .like-button:hover {
                color: #ff5e63;
            }

            .like-button i {
                margin-right: 5px;
            }

            .like-count {
                font-weight: bold;
                font-size: 14px;
            }
        </style>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <h1>Hilos</h1>

        <div class="navigation-link mb-4">
            <a href="{{ route('hilos.listar', 'fecha') }}" class="btn btn-custom">Ordenar por Fecha</a>
            <a href="{{ route('hilos.listar', 'likes') }}" class="btn btn-custom">Ordenar por Likes</a>
        </div>

        <div class="row">
            @foreach($hilos as $hilo)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            @if($hilo->usuario)
                            <div class="profile-picture">
                                <a href="{{ route('usuarios.show', $hilo->usuario->id) }}" class="card-link">
                                    @if($hilo->usuario->foto)
                                        <img src="{{ asset('images/' . $hilo->usuario->foto) }}" alt="Foto de perfil" class="img-fluid">
                                    @else
                                        <p class="no-profile-picture">No hay foto de perfil</p>
                                    @endif
                                </a>
                            </div>
                            @endif
                            <h5 class="card-title">
                                @if($hilo->usuario)
                                    <a href="{{ route('usuarios.show', $hilo->usuario->id) }}" class="card-link">{{ $hilo->usuario->Nombre }}</a>
                                @endif
                            </h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('hilos.show', $hilo->id) }}" class="card-link">
                                <p class="card-text">{{ $hilo->texto }}</p>
                            </a>
                        </div>
                        <div class="card-footer">
                            <div class="card-footer-item">
                                <i class="far fa-calendar-alt"></i>
                                <span>{{ $hilo->fecha }}</span>
                            </div>
                            <div class="like-section">
                                <div class="like-button" data-hilo-id="{{ $hilo->id }}">
                                    <i class="far fa-heart"></i>
                                    <span class="like-count">{{ $hilo->usuarios->count() }}</span>
        </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>    
@endsection
