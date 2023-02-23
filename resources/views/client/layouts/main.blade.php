<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width"/>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"> -->
    <link rel="stylesheet" href="{{asset('assets/md/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/md/css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/animate.css')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/fav.png')}}" />
<<<<<<< HEAD
=======

    <scritp src="{{asset('assets/js/app.js')}}" defer></scritp>
>>>>>>> devs
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/index.css')}}">
    <title>ТурМедДрайвер</title>
</head>

@yield('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('assets/md/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/md/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/md/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/md/js/mdb.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU"></script>
<script type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/js/main-js.js')}}"></script>

</html>