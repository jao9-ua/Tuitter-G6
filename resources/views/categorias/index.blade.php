@extends('layouts.master')

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>Listado de categorías</h1>
    <a href="{{ route('categorias.crear') }}" class="btn btn-primary">Crear Categoria</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Hashtag</th>
            <th>Views</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria)
        <tr>
            <td>{{ $categoria->id }}</td>
            <td>{{ $categoria->hashtag }}</td>
            <td>{{ $categoria->views }}</td>
            <td>
                @if ($categoria->imagen)
                <img src="{{ asset('storage/categoria_photos/' . $categoria->imagen) }}" alt="foto categoria">
                @else
                Sin imagen
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection