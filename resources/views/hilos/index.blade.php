@extends('layouts.master')

@section('content')

<div class="container">
    <h1>Hilos y sus tuits</h1>
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