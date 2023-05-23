@extends('layouts.master')

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1>Listado de categorías</h1>
    <a href="{{ route('categorias.crear') }}" class="btn btn-primary">Crear Categoría</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Hashtag</th>
            <th>Views</th>
            <th>Imagen</th>
            <th>Acciones</th> 
        </tr>
    </thead>
    <tbody>
        @if ($categorias)
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
                <td> 
                    <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-info">Ver</a>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
