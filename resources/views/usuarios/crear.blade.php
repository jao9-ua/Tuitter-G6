@extends('layouts.master')

@section('content')
    <h1>Crear Usuario</h1>
    <form method="POST" action="{{ route('usuario.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="Nombre">Nombre:</label>
            <input type="text" name="Nombre" id="Nombre" value="{{ old('Nombre') }}" required>
        </div>
        <div>
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto">
        </div>
        <div>
            <label for="biografia">Biografía:</label>
            <textarea name="biografia" id="biografia">{{ old('biografia') }}</textarea>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" minlength="8" required>
        </div>
        <div>
            <button type="submit">Crear Usuario</button>
        </div>
    </form>
@endsection