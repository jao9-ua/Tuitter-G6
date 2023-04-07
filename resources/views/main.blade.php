@extends('layouts.master')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        .rectangle-12 {
            width: 1366px;
            height: 244px;
            padding: 8px 8px 8px 8px;
            background: #72bb53;
            border-color: #000000;
            border-width: 1px;
            border-style: solid;
        }

        .rectangle-1 {
            width: 169px;
            height: 169px;
            float: left;
            padding: 8px 8px 8px 8px;
            background: #eeeeee;
            border-radius: 1px 1px 1px 1px;
        }

        .rectangle-11 {
            width: 111px;
            height: 50px;
            padding: 8px 8px 8px 8px;
            float: left;
            margin-left: 30px;
            background: #aedd94;
            border-color: #cccccc;
            border-width: 1px;
            border-style: solid;
            border-radius: 3px 3px 0px 0px;
        }

        .admin-1 {
            width: 58px;
            height: 25px;
            color: #000000;
            font-family: "Helvetica";
            font-weight: 400;
            font-size: 20px;
            text-align: left;
        }

        /*letras blancas*/

        .rectangle-23 {
            width: 232px;
            height: 73px;
            padding: 8px 8px 8px 8px;
            background: #ffffff;
            border-radius: 3px 3px 3px 3px;
        }

        .rectangle-21 {
            width: 135px;
            height: 73px;
            padding: 8px 8px 8px 8px;
            background: #ffffff;
            border-radius: 3px 3px 3px 3px;
        }

        .tuits-2 {
            width: 73px;
            height: 28px;
            color: #72bb53;
            font-family: "Helvetica";
            font-weight: 400;
            font-size: 20px;
            text-align: left;
        }

        .rectangle-22 {
            width: 135px;
            height: 73px;
            padding: 8px 8px 8px 8px;
            background: #ffffff;
            border-radius: 3px 3px 3px 3px;
        }

        .profile-2 {
            width: 73px;
            height: 36px;
            color: #72bb53;
            font-family: "Helvetica";
            font-weight: 400;
            font-size: 20px;
            text-align: left;
        }

        .eventos-2 {
            width: 116px;
            height: 36px;
            color: #72bb53;
            font-family: "Helvetica";
            font-weight: 400;
            font-size: 20px;
            text-align: center;
        }

        .rectangle-24 {
            width: 54px;
            height: 39px;
            padding: 8px 8px 8px 8px;
            background: #ff3823;
            border-radius: 9px 9px 9px 9px;
        }

        .num12-2 {
            width: 30px;
            height: 34px;
            color: #ffffff;
            font-family: "Helvetica";
            font-weight: 700;
            font-size: 15px;
            text-align: center;
        }

        .rectangle-25 {
            width: 275px;
            height: 73px;
            padding: 8px 8px 8px 8px;
            background: #ffffff;
            border-radius: 3px 3px 3px 3px;
        }

        .categorias-4 {
            width: 192px;
            height: 36px;
            color: #72bb53;
            font-family: "Helvetica";
            font-weight: 400;
            font-size: 20px;
            text-align: center;
        }

        .botones {
            float: right;
        }
    </style>
</head>
@section('header')
<body class="antialiased">
    @endsection
    @yield('content')
</body>

</html>