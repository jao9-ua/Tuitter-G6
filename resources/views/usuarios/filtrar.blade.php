@extends('layouts.master')

@section('content')

<div class="container">

    <h1>Resultados de la búsqueda</h1>

    @if($usuarios->count())

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                @if(isset($usuario->id) && isset($usuario->Nombre) && isset($usuario->email))
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->Nombre }}</td>
                    <td>{{ $usuario->email }}</td>
                <td>
                <a href="{{ route('usuarios.show', ['id' => $usuario->id]) }}" class="btn btn-info">Ver</a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <div class="alert alert-info mt-4" role="alert">
        No se encontraron resultados para la búsqueda.
    </div>
    @endif

</div>

@endsection
