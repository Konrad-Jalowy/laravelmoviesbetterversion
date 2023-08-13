<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Movie
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('movielist')}}">Movies</a></li>
                                <li><a class="dropdown-item" href="{{route('movie.best')}}">Best movies</a></li>
                                <li><a class="dropdown-item" href="{{route('movie.worst')}}">Worst movies</a></li>
                                <li><a class="dropdown-item" href="{{route('movie.longest')}}">Longest movies</a></li>
                                <li><a class="dropdown-item" href="{{route('movie.shortest')}}">Shortest movies</a></li>
                                <li><a class="dropdown-item" href="{{route('movie.oldest')}}">Oldest movies:</a></li>
                                <li><a class="dropdown-item" href="{{route('movie.newest')}}">Newest movies:</a></li>
                                <li><a class="dropdown-item" href="{{route('categorylist')}}">Categories</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('movie.add')}}">Add movie</a></li>
                                <li><a class="dropdown-item" href="{{route('category.add')}}">Add category</a></li>
                            </ul>
                            </li>
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Articles
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('articlelist')}}">Articles</a></li>
                                <li><a class="dropdown-item" href="{{route('article.bydate')}}">Latest</a></li>
                                <li><a class="dropdown-item" href="{{route('article.byviews')}}">Most viewed</a></li>
                                <li><a class="dropdown-item" href="{{route('article.byanswers')}}">Most answered</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('article.add')}}">Add article</a></li>
                                <li><a class="dropdown-item" href="{{route('delayed.add')}}">Add delayed article</a></li>
                                <li><a class="dropdown-item" href="{{route('delayed.list')}}">Articles waiting</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                People
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('directorlist')}}">Directors</a></li>
                                <li><a class="dropdown-item" href="{{route('actorlist')}}">Actors</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('director.add')}}">Add director</a></li>
                                <li><a class="dropdown-item" href="{{route('actor.add')}}">Add actor</a></li>
                            </ul>
                            </li>
                    </ul>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                     </form>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('js_after')
</body>
</html>
