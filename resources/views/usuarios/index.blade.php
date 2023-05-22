@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Lista de usuarios</h1>
        <form action="{{ route('usuarios.filtrar') }}" method="GET">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

        <div class="mt-4">
            <a href="{{ route('usuarios.ordenar', 'nombre') }}" class="btn btn-secondary">Ordenar por Nombre</a>
            <a href="{{ route('usuarios.ordenar', 'email') }}" class="btn btn-secondary">Ordenar por Email</a>
        </div>

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
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->Nombre }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <a href="{{ route('usuarios.show', ['id' => $usuario->id]) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('usuario.destroy', $usuario->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
