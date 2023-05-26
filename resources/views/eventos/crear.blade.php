@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Evento</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('evento.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group{{ $errors->has('texto') ? ' has-error' : '' }}">
                            <label for="texto">Texto:</label>
                            <textarea id="texto" name="texto" class="form-control" rows="3">{{ old('texto') }}</textarea>
                            @if ($errors->has('texto'))
                                <span class="help-block">{{ $errors->first('texto') }}</span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('Imagen') ? ' has-error' : '' }}">
                            <label for="Imagen">Imagen:</label>
                            <input type="file" id="Imagen" name="Imagen" class="form-control-file">
                            @if ($errors->has('Imagen'))
                                <span class="help-block">{{ $errors->first('Imagen') }}</span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="fecha_ini">Fecha de inicio:</label>
                                <input type="date" id="fecha_ini" name="fecha_ini" class="form-control" value="{{ old('fecha_ini') }}">
                                @if ($errors->has('fecha_ini'))
                                    <span class="help-block">{{ $errors->first('fecha_ini') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_fin">Fecha de finalización:</label>
                                <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" value="{{ old('fecha_fin') }}">
                                @if ($errors->has('fecha_fin'))
                                    <span class="help-block">{{ $errors->first('fecha_fin') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria_id">Categoría:</label>

                            <div class="col-md-6">
                                <select id="categoria_id" class="form-control{{ $errors->has('categoria_id') ? ' is-invalid' : '' }}" name="categoria_id" value="{{ old('categoria_id') }}">
                                    <option value="">Seleccionar categoría</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->hashtag }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('categoria_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categoria_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

