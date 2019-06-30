<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @guest
            <div>
                @yield('content')
            </div>
        @else
            <div>
                <div class="ui menu menu-horizontal">
                    <a class="right menu user-data">
                        <img class="ui image image-data-user" src="{{asset('images/man.png')}}" alt="">
                        <span class="user">{{ Auth::user()->name }}</span>
                    </a>
                </div>
                <div class="ui vertical menu menu-vertical">
                    <div>
                        <img class="ui centered image image-user" src="{{asset('images/man.png')}}" alt="">
                        <div class="name-user"><span>{{ Auth::user()->name }}</span></div>
                        <div class="email-user">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="ui divider"></div>
                    <a href="{{ route('home') }}" class="item">
                        <i class="tachometer alternate icon"></i> Dashboard
                    </a>
                    <a class="item">
                        <i class="dolly flatbed icon"></i> Estoque
                    </a>
                </div>
            </div>
        @endguest
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
</body>
</html>
