@extends('layouts.master')
@section('content')

<div class="container">
    <h1>Editar evento</h1>
    <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="texto">Texto del evento:</label>
            <textarea name="texto" id="texto" cols="30" rows="10" class="form-control">{{ $evento->texto }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
@endsection
