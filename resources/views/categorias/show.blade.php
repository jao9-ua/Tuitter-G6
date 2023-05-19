@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Categoría: {{ $categoria->hashtag }}</h1>
        <p>Eventos relacionados:</p>
        <ul>
            @foreach ($categoria->evento as $evento)
                <li>{{ $evento->titulo }}</li>
            @endforeach
        </ul>
    </div>
@endsection
