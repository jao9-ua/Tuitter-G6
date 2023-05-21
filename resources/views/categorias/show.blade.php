@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Categoría: {{ $categoria->hashtag }}</h1>
        <p>Eventos relacionados:</p>
        <p>Número de vistas: {{ $categoria->views }}</p>
        <img src="{{ asset('storage/categoria_photos/' . $categoria->imagen) }}" alt="Foto de perfil">
        <ul>
            @foreach ($categoria->evento as $evento)
                <li>{{ $evento->texto }}</li>
            @endforeach
        </ul>
    </div>
@endsection
