@extends('main')

@section('content')
<div class="container">
    <h1>Editar usuario</h1>
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $usuario->nombre }}">
        </div>
        <div class="form-group">
            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo" id="correo" class="form-control" value="{{ $usuario->correo }}">
        </div>
        <div class="form-group">
            <label for="biografia">Biografía:</label>
            <textarea name="biografia" id="biografia" cols="30" rows="10" class="form-control">{{ $usuario->biografia }}</textarea>
        </div>
        <div class="form-group">
            <label for="password">Nueva contraseña:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
@endsection
