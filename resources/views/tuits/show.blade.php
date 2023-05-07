@extends('layouts.master')
@section('content')
<div class="container">
    <h1>Tuit</h1>
    <div class="tuit">
        <p>{{ $tuit->texto }}</p>
        @if ($tuit->imagen)
            <img src="{{ $tuit->imagen }}" alt="Imagen del tuit">
        @endif
        <p>Fecha: {{ $tuit->fecha }}</p>
        <p>Orden: {{ $tuit->orden }}</p>
        <p>Hilo: {{ $tuit->hilo->titulo }}</p>
    </div>
</div>

@endsection