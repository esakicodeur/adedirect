<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Direct') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@300;400;700&family=Inria+Serif:wght@300;400;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/room.css') }}">
        <link rel="stylesheet" href="{{ asset('css/lobby.css') }}">

    </head>
    <body>
        <header id="nav">
            <div class="nav--list">
                <button id="members__button">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{ route('home') }}">
                    <h3 id="logo">
                        <img src="{{ asset('images/ade.png') }}" alt="Site Logo">
                        <span>Académie des élites</span>
                    </h3>
                </a>
            </div>

            <div id="nav__links">
                <button id="chat__button">
                    <i class="fas fa-comments"></i>
                </button>

                @auth
                    <a href="lobby.html">
                        <button type="submit">Créer une salle</button>
                    </a>
                @endauth

                <ul class="flex items-center">
                    @auth
                        <li>
                            <a href="" class="p-3">Alex</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="inline p-3">
                                @csrf

                                <button type="submit" class="p-3">Se deconnecter</button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li>
                            <a href="{{ route('login') }}" class="p-3">Se connecter</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="p-3">S'inscrire</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </header>



        @yield('content')

        <script src="{{ asset('js/AgoraRTC_N-4.11.0.js') }}"></script>
        <script src="{{ asset('js/agora-rtm-sdk-1.4.4.js') }}"></script>
        {{-- <script src="{{ asset('js/room.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/room_rtm.js') }}"></script>
        <script src="{{ asset('js/room_rtc.js') }}"></script> --}}
    </body>
</html>
