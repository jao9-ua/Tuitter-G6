@extends('layouts.master')

@section('content')
<style>
    /* Estilos personalizados */
    .container {
        max-width: 900px;
        margin: 0 auto;
    }

    h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 40px;
        text-align: center;
    }

    .input-group {
        display: flex;
        margin-bottom: 20px;
    }

    .form-control {
        flex: 1;
        padding: 10px;
        border-radius: 5px 0 0 5px;
        border-right: none;
    }

    .btn-primary {
        border-radius: 0 5px 5px 0;
    }

    .row {
        margin: 0 -15px;
    }

    .col-md-4 {
        padding: 0 15px;
    }

    .card {
        border: none;
        background-color: #f9f9f9;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-img-top {
        border-radius: 5px 5px 0 0;
    }

    .card-title {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 15px;
        text-align: center;
    }

    .card-text {
        color: #777;
        margin-bottom: 10px;
    }

    .btn-primary.custom {
        background-color: transparent;
        border-color: transparent;
        color: #333;
        transition: background-color 0.3s ease;
    }

    .btn-primary.custom:hover {
        background-color: #72bb53;
        border-color: #72bb53;
        color: #fff;
    }

    .btn-primary.custom:focus {
        box-shadow: none;
    }

    .text-center {
        text-align: center;
    }

    .mt-3 {
        margin-top: 15px;
    }

    .mt-4 {
        margin-top: 20px;
    }
    
    /* Estilos de la navegación */
    .navigation {
        background-color: #f8f9fa;
        padding: 10px;
        text-align: center;
    }

    .navigation-links {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    .navigation-link {
        margin-right: 10px;
    }

    .navigation-link a {
        color: #333;
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .navigation-link a:hover {
        background-color: #72bb53;
        color: #fff;
    }
</style>


<div class="container">
    <h1>Categorías</h1>

    <!-- Formulario de búsqueda -->
    <form action="{{ route('categorias.buscar') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar categoría...">
            <button type="submit" class="btn btn-primary"
                style="background-color: transparent; border-color: transparent; color: #333;"
                onmouseover="this.style.backgroundColor='#72bb53'; this.style.borderColor='#72bb53'; this.style.color='#fff';"
                onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='transparent'; this.style.color='#333';"
            >
                Buscar
            </button>
        </div>
    </form>


    <!-- Lista de categorías -->
    <div class="row">
        @forelse ($categorias as $categoria)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="{{ $categoria->imagen }}" alt="Imagen de la categoría" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center">#{{ $categoria->hashtag }}</h5>
                        <div class="text-center">
                            <div class="d-inline-block">
                                <p class="card-text">
                                    <i class="far fa-comment-alt"></i>
                                    Hilos: <span>{{ $categoria->hilo->count() }}</span>
                                </p>
                            </div>
                            <div class="d-inline-block">
                                <p class="card-text">
                                    <i class="far fa-calendar-alt"></i>
                                    Eventos: <span>{{ $categoria->evento->count() }}</span>
                                </p>
                            </div>
                        </div>
                        <p class="card-text text-center mt-3"><strong>Views:</strong> {{ $categoria->views }}</p>
                        <div class="text-center mt-3">
                            <a href="{{ route('categoria.mostrar', ['id' => $categoria->id]) }}"
                                class="btn btn-primary"
                                style="background-color: transparent; border-color: transparent; color: #333;"
                                onmouseover="this.style.backgroundColor='#72bb53'; this.style.borderColor='#72bb53'; this.style.color='#fff';"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='transparent'; this.style.color='#333';"
                            >
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <p class="text-center">No se encontraron categorías.</p>
            </div>
        @endforelse
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $categorias->links() }}
    </div>
</div>
@endsection

