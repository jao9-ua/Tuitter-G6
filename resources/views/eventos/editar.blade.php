@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Editar Evento</h1>
            <form method="POST" action="{{ route('evento.update', ['id' => $evento->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="texto">Texto:</label>
                <input type="text" class="form-control @error('texto') is-invalid @enderror" id="texto" name="texto" value="{{ old('texto', $evento->texto) }}">
                @error('texto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="fecha_ini">Fecha de inicio:</label>
                <input type="date" class="form-control @error('fecha_ini') is-invalid @enderror" id="fecha_ini" name="fecha_ini" value="{{ old('fecha_ini', $evento->fecha_ini) }}">
                @error('fecha_ini')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha de fin:</label>
                <input type="date" class="form-control @error('fecha_fin') is-invalid @enderror" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin', $evento->fecha_fin) }}">
                @error('fecha_fin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
