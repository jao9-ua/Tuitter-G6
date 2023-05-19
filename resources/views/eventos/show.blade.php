@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Evento: {{ $evento->texto }}</h1>
        
        @if ($evento->categoria)
            <p>Categoría: {{ $evento->categoria->hashtag }}</p>
        @endif
        @if ($evento->usuario)
        <p>Usuario: {{ $evento->usuario->name }}</p>
        @endif

        @if ($evento->imagen)
        <img src="{{ $evento->imagen }}" alt="Imagen del evento">
        @endif

    </div>
@endsection
