@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Tuit</div>

                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('tuits.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="texto">Texto</label>
                                <textarea id="texto" name="texto" class="form-control">{{ old('texto') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input id="imagen" type="file" name="imagen" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input id="fecha" type="date" name="fecha" value="{{ old('fecha', date('Y-m-d')) }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="orden">Orden</label>
                                <input id="orden" type="number" name="orden" value="{{ old('orden') }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection