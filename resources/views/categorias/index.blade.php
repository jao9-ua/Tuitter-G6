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
                @if (auth()->user()->es_Admin)
                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
