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