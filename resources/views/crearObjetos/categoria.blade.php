@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Crear Categoría</h1>
        <form method="POST" action="{{ route('categorias.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="hashtag">Hashtag:</label>
                <input type="text" name="hashtag" class="form-control @error('hashtag') is-invalid @enderror" value="{{ old('hashtag') }}" required>
                @error('hashtag')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="views">Views:</label>
                <input type="number" name="views" class="form-control @error('views') is-invalid @enderror" value="{{ old('views') }}" required>
                @error('views')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" class="form-control-file @error('imagen') is-invalid @enderror">
                @error('imagen')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection