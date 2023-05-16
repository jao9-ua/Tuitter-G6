@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Crear nuevo hilo</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('hilo.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="texto" class="col-md-4 col-form-label text-md-right">Texto</label>

                                <div class="col-md-6">
                                    <textarea id="texto" class="form-control{{ $errors->has('texto') ? ' is-invalid' : '' }}" name="texto" value="{{ old('texto') }}" required autofocus></textarea>

                                    @if ($errors->has('texto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('texto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="imagen" class="col-md-4 col-form-label text-md-right">Imagen</label>

                                <div class="col-md-6">
                                    <input id="imagen" type="file" class="form-control{{ $errors->has('imagen') ? ' is-invalid' : '' }}" name="imagen" value="{{ old('imagen') }}">

                                    @if ($errors->has('imagen'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('imagen') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="categoria_id" class="col-md-4 col-form-label text-md-right">Categoría</label>

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

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Publicar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection