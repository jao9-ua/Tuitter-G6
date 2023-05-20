@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset('storage/hilos_photos/' . $hilo->imagen) }}" alt="{{ $hilo->texto }}" class="img-fluid">
            <h1>{{ $hilo->texto }}</h1>
            @if ($hilo->imagen)

            @endif
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <h2>Tuits relacionados:</h2>
            <ul>
                @foreach ($hilo->tuits as $tuit)
                <li>
                    <h4>{{ $tuit->texto }}</h4>
                    @if ($tuit->imagen)
                    <img src="{{ asset('storage/' . $tuit->imagen) }}" alt="{{ $tuit->texto }}" class="img-fluid">
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection