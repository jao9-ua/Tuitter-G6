@extends('layouts.master')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Hilos y sus tuits</h1>
        <a href="{{ route('hilo.crear') }}" class="btn btn-primary">Crear Hilo</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Hilo</th>
                <th>Texto del hilo</th>
            </tr>
        </thead>
        <tbody>
            @if ($hilos)
            @foreach($hilos as $hilo)
            <tr>
                <td>{{ $hilo->id }}</td>
                <td>{{ $hilo->nombre }}</td>
                <td>{{ $hilo->texto }}</td>
                <td><a href="{{ route('tuits.crear', ['hilo' => $hilo]) }}" class="btn btn-primary">Contestar hilo</a></td>
                <td>
                    @if (auth()->user()->es_Admin)
                    <form action="{{ route('hilos.destroy', $hilo->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar hilo</button>
                    </form>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tuits</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($hilo->tuits)
                            @foreach ($hilo->tuits as $tuit)
                            <tr>
                                <td>{{ $tuit->texto }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection