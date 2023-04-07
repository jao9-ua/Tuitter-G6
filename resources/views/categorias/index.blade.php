
@extends('layouts.master')

@section('content')
    <h1>Listado de categorías</h1>

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
                            <img src="{{ asset('images/' . $categoria->imagen) }}" alt="{{ $categoria->hashtag }}" class="img-fluid">
                        @else
                            Sin imagen
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
