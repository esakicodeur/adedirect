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
            </div>
        </header>

        <main id="room__lobby__container">
            <div id="form__container">
                <div id="form__container__header">
                    <p>Créer ou Joindre la salle</p>
                </div>

                <form id="lobby__form">
                    <div class="form__field__wrapper">
                        <label for="name">Votre Nom</label>
                        <input type="text" name="name" id="name" required placeholder="Entrez votre nom...">
                    </div>

                    <div class="form__field__wrapper">
                        <label for="room">Nom de la salle</label>
                        <input type="text" name="room" id="room" placeholder="Entrez le nom de la salle...">
                    </div>

                    <div class="form__field__wrapper">
                        <button type="submit">Aller dans la salle
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </main>

        <script src="{{ asset('js/lobby.js') }}"></script>
    </body>
</html>
