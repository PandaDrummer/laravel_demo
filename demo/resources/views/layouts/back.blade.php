<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href=" {{asset('css/main.css')}} ">
    <link rel="stylesheet" type="text/css" href=" {{asset('css/bootstrap.min.css')}} ">
    <link rel="stylesheet" type="text/css" href="css/mygrid.css">
</head>
<body>
<header>
    <nav>
        <ul class="nav-links">
            <li>
                <a href="{{action('SiteController@index')}}">Главная</a>
            </li>
            <li>
                <a href="{{route('product')}}">Добавить торт</a>
            </li>
            <li>
                <a href="{{route('filling')}}">Добавить начинку</a>
            </li>
            <li>
                <a href="{{route('shape')}}">Добавить форму </a>
            </li>
            <li>
                <a href="{{route('decoration')}}">Добавить украшения </a>
            </li>
            <li>
                <a href="{{route('login.logout')}}">Выйти </a>
            </li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>
@yield('content')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>
