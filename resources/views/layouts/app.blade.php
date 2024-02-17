<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">

    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/all.min.css')}}" rel="stylesheet">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta property="og:title" content="{{config('app.name', 'Laravel') }}">
    <meta property="og:description" content="this test appp">
    <meta name="keywords" content= 'Laravel , PHP'>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('assets/css/jssocials-theme-classic.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jssocials.css')}}" rel="stylesheet">
    
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{ asset('assets/js/share.js') }}"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js' , "resources/js/bootstrap.bundle.min.js"])
</head>
<body >
    <div id="app" class="background-container">
            @include('inc.navbar')
        <main class=" container py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset("assets/js/searchBar.js")}}"></script>
</body>
</html>
