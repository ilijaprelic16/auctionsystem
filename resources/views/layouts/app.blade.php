<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Auction</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">     <style>
        body {
            background: url('https://www.rrts.com/wp-content/uploads/2018/09/Blue-Background.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
    </style>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">

            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Auction
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
@auth
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <!-- Products -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/products" id="navbardrop" data-toggle="dropdown">
                                Products
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/products">My Products</a>
                                <a class="dropdown-item" href="#">Add New Product</a>
                            </div>
                        </li>

                        <!-- Auctions -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/#" id="navbardrop" data-toggle="dropdown">
                                Auctions
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/start-auction">Start Auction</a>
                                <a class="dropdown-item" href="/auctions">All Auctions</a>
                                <a class="dropdown-item" href="/my-auctions">My Auctions</a>

                            </div>
                        </li>

                        <!-- Bids -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Bids
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">My Bids</a>
                                <a class="dropdown-item" href="#">Bid history</a>
                                <a class="dropdown-item" href="#">Statistics</a>
                            </div>
                        </li>
                    </ul>
@endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
                @yield('content')
        </main>
    </div>
</body>
</html>
