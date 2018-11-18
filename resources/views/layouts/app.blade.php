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
        <div id="header">
            <Slide>
                @guest
                    <a @click="load" href="{{ route('login') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>_{{ __('Login') }}</span>
                    </a>
                    @if (Route::has('register'))
                        <a @click="load" href="{{ route('register') }}">
                            <i class="far fa-address-card"></i>
                            <span>_{{ __('Register') }}</span>
                        </a>
                    @endif
                @else
                    <a @click="load" href="{{ url('/player') }}">
                        <i class="fas fa-hotel"></i>
                        <span>{{ config('app.name') }}</span>
                    </a>
                    <a @click="load" href="{{ url('/player/create') }}">
                        <i class="fas fa-user-astronaut"></i>
                        <span>Create_player</span>
                    </a>
                    <a @click="load" href="{{ route('stat') }}">
                        <i class="fas fa-chart-bar"></i>
                        <span>Analytics</span>
                    </a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </Slide>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" />
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
