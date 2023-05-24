<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .header {
            position: relative;
            background: url("{{ asset('images/Logo_tuit.jpeg')}}") no-repeat center center;
            background-size: cover;
            padding: 40px;
            text-align: center;
            color: #ffffff;
        }

        .header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
        }

        .header-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .header-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .header-description {
            font-size: 18px;
        }

        /* Estilos de la barra de navegación */
        .navigation {
            background-color: #f8f9fa;
            padding: 10px;
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

        /* Estilos del contenido */
        .container {
            margin: 20px auto;
            max-width: 800px;
            text-align: center;
        }

        .content-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #72bb53;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .content-button:hover {
            background-color: #469e3f;
        }
    </style>

    <title>Tuit</title>
</head>

<body>
        <!-- Incluir archivos JS de Bootstrap (jQuery es requerido) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
        
    <header class="header">
        <div class="header-overlay"></div>
        <div class="header-content">
            <h1 class="navigation-link header-title">
                <a href="{{ route('/Acerca') }}">Tuit</a>
            </h1>
            <p class="header-description">La red social de microblogging</p>
        </div>
    </header>

    <nav class="navigation">
        <ul class="navigation-links">
            @auth
            @php
                $userID = auth() -> user() -> id
            @endphp

            <li class="navigation-link"><a href="{{ route('usuarios.edit', ['id' => $userID]) }}">Perfil</a></li>
            <li class="navigation-link"><a href="{{ route('hilos.listar', ['orden' => 'fecha']) }}">Tuits</a></li>
            <li class="navigation-link"><a href="{{ route('eventos.index') }}">Eventos</a></li>
            <li class="navigation-link"><a href="{{ route('categorias.index') }}">Categorías</a></li>
            <!-- HAY QUE CONTROLAR LA SESION SI NO ESTA INICIADA QUE NO SE MUESTRE Y SI ESTA INICIADA QUE SE COMPRUEBE QUE SEA ADMIN-->
            @if (auth()->user()->es_Admin)
            <li class="navigation-link dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ADMIN <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a></li>
                    <li><a class="dropdown-item" href="{{ route('categorias.index') }}">Categorías</a></li>
                    <li><a class="dropdown-item" href="{{ route('hilos.index') }}">Hilos y Tuits</a></li>
                    <li><a class="dropdown-item" href="{{ route('eventos.index') }}">Eventos</a></li>
                </ul>
                </li>
            @endif

            @endauth

            @guest
            <!-- Mostrar estos enlaces solo si el usuario no está autenticado -->
            <li class="navigation-link"><a href="{{ route('login') }}">Login</a></li>
            <li class="navigation-link"><a href="{{ route('register') }}">Register</a></li>
            @endguest
        </ul>
    </nav>
    <div class="vh-100" id="content">
        @yield('content')
    </div>
   <!-- Incluir archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

</body>

</html>
