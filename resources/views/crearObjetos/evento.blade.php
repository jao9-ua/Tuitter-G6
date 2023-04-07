@extends('main')

@section('content')
    <div class="container">
        <h1>Crear evento</h1>
        <form method="POST" action="{{ route('eventos.store') }}">
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" name="fecha" id="fecha" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear evento</button>
        </form>
    </div>
@endsection