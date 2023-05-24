@extends('layouts.master')

@section('content')

<!-- categorias/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Categorías</h1>

        <!-- Formulario de búsqueda -->
        <form action="{{ route('categorias.buscar') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar categoría...">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <!-- Tabla de categorías -->
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
                @forelse ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->hashtag }}</td>
                        <td>{{ $categoria->views }}</td>
                        <td>
                            @if ($categoria->imagen)
                                <img src="{{ $categoria->imagen }}" alt="Imagen de la categoría" width="50">
                            @else
                                Sin imagen
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No se encontraron categorías</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginación -->
        {{ $categorias->links() }}
    </div>
@endsection
