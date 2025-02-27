@extends('layouts.master')

@section('content')

    @php
        $url = request()->url();
        $userId = substr($url, strrpos($url, '/') + 1);
        $user = App\Models\Usuario::find($userId);
        $userName = $user ? $user->Nombre : 'Usuario Desconocido';
    @endphp
    <h1>Listado de eventos de {{ $userName }}</h1>

    <form action="{{ route('eventos.index') }}" method="GET" class="form-inline mb-4">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar" class="form-control mr-sm-2">
        <input type="date" name="fecha" value="{{ request('fecha') }}" placeholder="Fecha" class="form-control mr-sm-2">
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    <div class="mt-4">
        <a href="{{ route('eventos.ordenar', 'fecha_fin') }}" class="btn btn-secondary">Ordenar por Fecha de Fin</a>
        <a href="{{ route('eventos.ordenar', 'fecha_ini') }}" class="btn btn-secondary">Ordenar por Fecha de Inicio</a>
        <a href="{{ route('eventos.crear') }}" class="btn btn-primary">Crear Evento</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Texto</th>
                <th scope="col">Imagen</th>
                <th scope="col">Fecha inicio</th>
                <th scope="col">Fecha fin</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($eventos as $evento)
                <tr>
                    <th scope="row">{{ $evento->id }}</th>
                    <td>{{ $evento->texto }}</td>
                    <td>{{ $evento->imagen }}</td>
                    <td>{{ $evento->fecha_ini }}</td>
                    <td>{{ $evento->fecha_fin }}</td>
                    <td>
                        <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-primary btn-sm">Ver</a>
                        @if (auth()->user()->id === $evento->usuario_id)
                        <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                        @endif
                        @if (auth()->user()->es_Admin || auth()->user()->id === $evento->usuario_id)
                        <form action="{{ route('evento.destroy', $evento->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No se encontraron eventos.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
