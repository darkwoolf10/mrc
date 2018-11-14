<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{--<modal name="hello-world">--}}
            {{--hello, world!--}}
        {{--</modal>--}}
        <Slide id="menu">
            <a @click="load" href="{{ url('/player') }}"><span><i class="fas fa-home">{{ config('app.name') }}</i></span></a>
            <a @click="load" href="{{ url('/player/create') }}"><span><i class="fas fa-user-astronaut">Create_player</i></span></a>
            <a @click="load" href="{{ route('stat') }}"><span><i class="fas fa-chart-bar">Stat</i></span></a>
        </Slide>

        <main class="py-4" style="margin-top: 3em; ">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" />
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
