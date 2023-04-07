@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Resultados de la búsqueda</h1>
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
                @if ($usuarios)
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->Nombre }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <a href="{{ route('usuarios.filtrar', $usuario->id) }}" class="btn btn-info">Ver</a>
                        </td>
                    </tr>
                @endforeach
                {{ $usuarios->links() }}
                @endif
            </tbody>
        </table>
    </div>
@endsection
