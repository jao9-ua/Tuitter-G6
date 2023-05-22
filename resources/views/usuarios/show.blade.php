@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Información de usuario') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                        <div class="col-md-6">
                            <p>{{ $usuario->Nombre }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col-md-6">
                            <p>{{ $usuario->email }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
                        <div class="col-md-6">
                            @if($usuario->foto)
                            <img src="{{ asset('storage/profile_photos/' . $usuario->foto) }}" alt="Foto de perfil">
                            @else
                            <p>No hay foto de perfil</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="biografia" class="col-md-4 col-form-label text-md-right">{{ __('Biografía') }}</label>
                        <div class="col-md-6">
                            <p>{{ $usuario->biografia }}</p>
                        </div>
                    </div>

                    <!--<div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                        <div class="col-md-6">
                            <p>*******</p>
                        </div>
                    </div> -->

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <!-- <a href="{{ route('usuarios.show', ['id' => $usuario->id]) }}" class="btn btn-primary">{{ __('Mostrar información') }}</a> -->
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <form action="{{ route('usuario.destroy', ['id' => $usuario->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar la cuenta?')">
                                    {{ __('Eliminar cuenta') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
