@extends('layouts.master')

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
    <style>
        /* Estilos adicionales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .profile-picture {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card-subtitle {
            font-size: 14px;
            color: #888;
            margin-bottom: 15px;
        }

        .card-text {
            margin-bottom: 20px;
        }

        .card-img {
            max-width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .list-group-item {
            border: none;
            background-color: #fff;
            margin-bottom: 10px;
            padding: 15px;
        }

        .list-group-item:last-child {
            margin-bottom: 0;
        }

        .list-group-item .media {
            align-items: center;
        }

        .list-group-item .media-body {
            flex: 1;
        }

        .list-group-item h6 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .list-group-item .card-text {
            font-size: 14px;
            color: #888;
            margin-bottom: 0;
        }

        /* Estilos de los botones */
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-blue {
            background-color: #3490dc;
            color: #fff;
        }

        .btn-blue:hover {
            background-color: #2779bd;
        }

       /* Estilos del botón "Me gusta" con fondo de corazón */
        .btn-red {
            background-color: #FF2929;
            color: #FF2929;
        }

        .btn-red:hover {
            background-color: #FF2929;

        }


        /* Estilos del corazón */
        .heart-icon {
            display: inline-block;
            width: 16px;
            height: 16px;
            background-image: url("{{ asset('images/heart-icon.png') }}");
            background-repeat: no-repeat;
            background-size: contain;
            vertical-align: middle;
            margin-right: 8px;
        }
    </style>

    <div class="container">
        <div class="card">
            <div class="flex items-center mb-4">
                @if($hilo->usuario)
                <a href="{{ route('usuario.perfil', ['id' => auth()->user()->id]) }}" style="text-decoration: none; color: #000;">

                <img src="{{ asset($hilo->usuario->foto) }}" alt="Foto de perfil" class="profile-picture">
                <div>
                    <h2 class="text-2xl font-bold mb-1">{{ $hilo->usuario->Nombre }}</h2>
                    <p class="text-gray-600">{{ $hilo->usuario->Email }}</p>
                </div>
                </a>
                @endif
            </div>
            <p class="text-gray-800 mb-4">{{ $hilo->texto }}</p>
            @if($hilo->imagen)
                <img src="{{ asset($hilo->imagen) }}" alt="Imagen del hilo" class="card-img">
            @endif
            <div class="flex items-center justify-between text-sm text-gray-600">
                <span>Fecha: {{ $hilo->fecha }}</span>
                <span>Likes: {{ $hilo->usuarios->count() }}</span>
            </div>
            <div>
                <button class="btn btn-red mt-4">
                    <span class="heart-icon"></span>
                    Me gusta
                </button>
                <a href="{{ route('tuits.crear', ['hilo' => $hilo]) }}" class="btn btn-blue mt-4">Responder</a>
            </div>
        </div>

        <h4 class="text-xl font-bold mb-4">Respuestas</h4>
        <div>
        @foreach($hilo->tuits->sortByDesc('fecha')->sortBy('orden') as $tuit)  
            <div class="bg-white rounded-lg shadow p-4 mb-4">
                <div class="flex items-center mb-2">
                    @if($tuit->usuario)
                    <a href="{{ route('usuario.perfil', ['id' => auth()->user()->id]) }}" style="text-decoration: none; color: #000;">

                        <img src="{{ asset($tuit->usuario->foto) }}" alt="Foto de perfil" class="profile-picture rounded-lg w-16 h-auto">
                        <div>
                            <h6 class="font-bold">{{ $tuit->usuario->Nombre }}</h6>
                        </div>
                    </a>
                    @endif
                </div>
                <p class="text-gray-800">{{ $tuit->texto }}</p>
                @if($tuit->imagen)
                    <div>
                        <img src="{{ asset($tuit->imagen) }}" alt="Imagen del tuit" class="mt-2 rounded-lg w-16 h-auto">
                    </div>
                @endif
                <div>
                    <button class="btn btn-red mt-4">
                        <span class="heart-icon"></span>
                        Me gusta
                    </button>
                    <a href="{{ route('tuits.crear', ['hilo' => $hilo]) }}" class="btn btn-blue mt-4">Responder</a>

                </div>
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <span>Fecha: {{ $tuit->fecha }}</span>
                    <span>Likes: {{ $tuit->usuarios->count() }}</span>
                </div>
            </div>
        @endforeach
        </div>
    </div>

@endsection
