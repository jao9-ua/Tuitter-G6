@extends('layouts.master')

@section('content')
    <div class="container">
    <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Contestar hilo</div>

                    <div class="card-body">
                        <form action="{{ route('tuits.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="hilo_id" value="{{ $hilo->id }}">
                            
                            <div class="form-group row">
                                <label for="texto" class="col-md-4 col-form-label text-md-right">Texto</label>
                                <div class="col-md-6">
                                    <textarea id="texto" name="texto" class="form-control">{{ old('texto') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="imagen" class="col-md-4 col-form-label text-md-right">Imagen</label>
                                <div class="col-md-6">
                                    <input id="imagen" type="file" name="imagen" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
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