<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <title>Tuit</title>
</head>
<style>
    .rectangle-12 {
        width: 100%;
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
        height: 36px;
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

<body>

    <div class="rectangle-12">

        <img src="{{ asset('images/Logo_tuit.jpeg')}}" alt="tuit_logo" class=rectangle-1>
        <div class="rectangle-11">
            <p class="admin-1">
                admin
            </p>
        </div>
    </div>
    <div class="vh-100" id="content">
        @yield('content')
    </div>
</body>

</html>