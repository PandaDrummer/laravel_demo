<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href=" {{asset('css/main.css')}} ">
    <link rel="stylesheet" type="text/css" href="{{asset('css/mygrid.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('css/animation.css')}} ">
</head>
<body>
<header>
    <nav>
        <ul class="nav-links">
            <li>
                <a href="{{action('SiteController@index')}}">Главная</a>
            </li>
            <li>
                <a href="{{route('site.product')}}">Готовые торты</a>
            </li>
            <li>
                <a href="{{route('createCake')}}">Создать торт</a>
            </li>
            <li>
                <a href="{{route('cart')}}">Корзина</a>
            </li>
                @if( \Illuminate\Support\Facades\Auth::check())
            <li>
                <a href="{{route('product')}}">Админка</a>
            </li>
                @endif
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>
<section class="preloader">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"  viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
    <g>
        <rect x="18" y="10" class="s1" fill="#FF4081" width="2" height="14"/>
        <rect x="28" y="10" class="s2" fill="#FF4081" width="2" height="14"/>
        <rect x="23" y="10" class="s3" fill="#FF4081" width="2" height="14"/>
    </g>
        <g>
            <path fill="#FF9800" class="fire" id="f1" d="M18,8c0-0.553,1-2,1-2s1,1.447,1,2s-0.447,1-1,1S18,8.553,18,8z"/>
            <path fill="#FF9800" class="fire" id="f2" d="M23,8c0-0.553,1-2,1-2s1,1.447,1,2s-0.447,1-1,1S23,8.553,23,8z"/>
            <path fill="#FF9800" class="fire" id="f3" d="M28,8c0-0.553,1-2,1-2s1,1.447,1,2s-0.447,1-1,1S28,8.553,28,8z"/>
        </g>
        <path fill="#FF4081" class="top" d="M34,31v-9c0-1.656-1.343-3-3-3H17c-1.657,0-3,1.344-3,3v9H34z"/>
        <path fill="#6A1B9A" class="top2" d="M31,19H17c-1.657,0-3,1.344-3,3l0,0c0,0,2.271,3.188,5,0c0,0,2.271,3.021,5,0c0,0,2.292,3.021,5,0  c0,0,2.313,3.063,5,0l0,0C34,20.344,32.657,19,31,19z"/>
        <g>
            <circle fill="#FFEB3B" id="y1" class="yelow" cx="16" cy="29" r="2"/>
            <circle fill="#FFEB3B" id="y2" class="yelow" cx="20" cy="29" r="2"/>
            <circle fill="#FFEB3B" id="y3" class="yelow" cx="24" cy="29" r="2"/>
            <circle fill="#FFEB3B" id="y4" class="yelow" cx="28" cy="29" r="2"/>
            <circle fill="#FFEB3B" id="y5" class="yelow" cx="32" cy="29" r="2"/>
        </g>
        <path fill="#FF4081" class="bottom" d="M40,41v-9c0-1.656-1.343-3-3-3H11c-1.657,0-3,1.344-3,3v9H40z"/>
        <path fill="#9FA8DA" d="M6,39v1c0,1.104,0.896,2,2,2h32c1.104,0,2-0.896,2-2v-1H6z"/>
        <path fill="#FCE4EC" class="line" d="M30.707,31.294l-0.633-0.633l-0.699,0.559c-4.627,3.703-7.021,3.72-10.668,0.074L18,30.587l-0.707,0.707  c-3.516,3.514-5.814,3.614-9.254,0.317C8.022,31.74,8,31.867,8,32v2.215c3.438,2.643,6.48,2.369,10.001-0.832  c3.855,3.494,7.224,3.468,11.93-0.063c1.956,1.796,3.763,2.694,5.569,2.694c1.473,0,2.946-0.603,4.5-1.796V32  c0-0.134-0.022-0.261-0.039-0.39C36.521,34.905,34.223,34.808,30.707,31.294z"/>
    </svg>

</section>
  @yield('content')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({

    });

</script>
</body>
</html>
