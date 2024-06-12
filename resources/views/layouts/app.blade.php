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

    <link rel="stylesheet" href="{{ asset('css/custom-pagination.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <livewire:styles>
</head>
    <style>
        body, .navbar{
            background-color: #000F13 !important;
        }
        .navbar{
            border-bottom: 1px solid rgba(208, 211, 212, 0.2) ;
            
        }
        input::placeholder{
            color: #D0D3D4;
        }
        input:focus{
            color: #D0D3D4;
        }

        a{
            text-decoration: none;
            color: white;
        }
    </style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-white shadow-sm">
            <div class="container">
                
                <a class="navbar-brand me-4" href="{{ route('movies.index') }}">
                    Movie App
                </a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-4">
                        <a href="{{ route('movies.index') }}">
                            Movies
                        </a>
                    </li>
                    
                    <li class="nav-item me-4">
                        <a href="{{ route('tv.index') }}">
                            TV Shows
                        </a>
                    </li>

                    <li class="nav-item me-4">
                        <a href="{{ route('actors.index') }}">
                            Actors
                        </a>
                    </li>
                </ul>
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <livewire:search-dropdown>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            <livewire:scripts>
        </main>
    </div>

</body>
</html>
