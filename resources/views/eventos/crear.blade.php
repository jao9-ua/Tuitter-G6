@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Evento</div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('evento.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group{{ $errors->has('texto') ? ' has-error' : '' }}">
                            <label for="texto">Texto:</label>
                            <textarea id="texto" name="texto" class="form-control">{{ old('Texto') }}</textarea>
                        </div>

                        <div class="form-group{{ $errors->has('Imagen') ? ' has-error' : '' }}">
                            <label for="Imagen">Imagen:</label>
                            <input type="file" id="Imagen" name="Imagen">
                        </div>

                        <div class="form-group{{ $errors->has('fecha_ini') ? ' has-error' : '' }}">
                            <label for="fecha_ini">Fecha de inicio:</label>
                            <input type="date" id="fecha_ini" name="fecha_ini" class="form-control" value="{{ old('fecha_ini') }}">
                        </div>

                        <div class="form-group{{ $errors->has('fecha_fin') ? ' has-error' : '' }}">
                            <label for="fecha_fin">Fecha de finalización:</label>
                            <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" value="{{ old('fecha_fin') }}">
                        </div>

                        <div class="form-group row">
                                <label for="categoria_id">Categoría</label>

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

                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection