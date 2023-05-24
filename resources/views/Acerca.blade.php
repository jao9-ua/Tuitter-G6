@extends('layouts.master')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f8f8f8;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 20px;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            line-height: 1.5;
            margin-bottom: 20px;
        }
    </style>

    <div class="container">
        <h1>Acerca de Nosotros</h1>

        <h2>Tuit: La red social de microblogging</h2>

        <p>
            <strong>The university interaction tool</strong> es una red social de microblogging creada por y para estudiantes de la asignatura DSS (Diseño de Sistemas Software) en la universidad. Nuestra plataforma está diseñada para fomentar la interacción social y educativa entre los miembros de la comunidad universitaria, incluyendo tanto a estudiantes como a profesorado.
        </p>

        <p>
            En Tuit, abordamos los problemas de desinformación que a menudo se presentan en el entorno universitario. Nuestros usuarios desempeñan un papel fundamental como informadores de recursos, compartiendo eventos y tuits que funcionan como un foro informativo. Creemos en el poder de la comunidad para proporcionar información valiosa y relevante para todos los miembros.
        </p>
    </div>
@endsection
