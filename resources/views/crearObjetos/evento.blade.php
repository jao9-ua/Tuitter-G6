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

                        <div class="form-group{{ $errors->has('Texto') ? ' has-error' : '' }}">
                            <label for="Texto">Texto:</label>
                            <textarea id="Texto" name="Texto" class="form-control">{{ old('Texto') }}</textarea>
                        </div>

                        <div class="form-group{{ $errors->has('Imagen') ? ' has-error' : '' }}">
                            <label for="Imagen">Imagen:</label>
                            <input type="file" id="Imagen" name="Imagen">
                        </div>

                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection