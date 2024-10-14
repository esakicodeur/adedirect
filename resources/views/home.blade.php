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
        <nav class="flex bg-black justify-between items-center position-fixed px-5">
            <div class="flex">
                <a href="{{ route('home') }}" id="brand" class="flex gap-2 items-center">
                    <img src="{{ asset('images/ade.png') }}" alt="" class="w-14 h-14">
                </a>
            </div>


            <div class="hidden lg:flex gap-5 items-center">
                @auth
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div class="hidden h-16 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link href="{{ route('dashboard') }}">
                                {{ Auth::user()->username }}
                            </x-nav-link>
                        </div>

                        <div class="relative ml-3">
                            <div align="right" width="48"  class="inline-flex rounded-md">
                                <form action="{{ route('logout') }}" method="POST" class="inline p-3">
                                    @csrf
                                    <button type="submit" class="px-3">{{ __('Se deconnecter') }}</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    @else
                    <div class="flex">
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link href="{{ route('dashboard') }}">
                                {{ __('Login') }}
                            </x-nav-link>

                            <x-nav-link href="{{ route('register') }}">
                                {{ __('Register') }}
                            </x-nav-link>
                        </div>
                    </div>
                    @endauth
            </div>

            <button onclick="handleMenu()" class="lg:hidden md:hidden">
                <x-zondicon-menu class="h-8 text-white" />
            </button>

            <div id="nav-dialog" class="hidden fixed z-10 md:hidden bg-white inset-0 p-3">
                <div id="nav-bar" class="flex justify-between">
                    <a href="{{ route('home') }}" id="brand" class="flex gap-2 items-center">
                        <img src="{{ asset('images/ade.png') }}" alt="" class="w-16 h-16">
                    </a>

                    <button class="p-2 bg-white md:hidden" onclick="handleMenu()">
                        <x-zondicon-close class="text-gray-900 h-8" />
                    </button>
                </div>

                <div class="mt-6">

                <div class="h-[1px] bg-gray-300"></div>

                <div class="w-full mt-6 flex flex-col gap-2">
                    @auth
                        <div class="relative ml-3">
                            <div align="right" width="48"  class="flex flex-col rounded-md">
                                <div>
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                        {{ Auth::user()->username }}
                                    </button>
                                </div>

                                <div>
                                    <form action="{{ route('logout') }}" method="POST" class="inline p-3">
                                        @csrf
                                        <button type="submit" class="p-3">{{ __('Se deconnecter') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="flex flex-col space-y-5">
                            <div>
                                <x-nav-link href="{{ route('dashboard') }}">
                                    {{ __('Login') }}
                                </x-nav-link>
                            </div>

                            <div>
                                <x-nav-link href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </x-nav-link>
                            </div>
                    </div>
                    @endauth
                </div>
            </div>
        </nav>

        {{-- Hero Section --}}
        <main>
            <div id="hero" class="min-h-screen bg-gradient-to-br from-gray-900 via-blue-500 to-transparent pt-28">
                <div id="hero-container" class="max-w-4xl mx-auto px-6 pb-32 flex flex-col sm:items-center sm:text-center">
                    <div id="version-text" class="flex items-center my-6 gap-2 border border-emerald-300 bg-emerald-500 rounded-lg px-3 py-1 w-fit shadow-md hover:shadow-lg hover:-translate-y-1 transition group">
                        <div class="w-2 h-2 bg-emerald-400 rounded-full border border-emerald-600"></div>
                        <p class="font-display text-emerald-600">v0.21.1: <span>Find-in-page bug fixes</span></p>
                        {{-- <x-zondicon-arrow-thin-right class="h-4 text-blue-600 group-hover:translate-x-2 transition duration-300" /> --}}
                    </div>
                    <h1 class="text-4xl font-semibold leading-snug mt-4 sm:text-6xl sm:leading-normal text-black">Web app to desktop app in minutes</h1>
                    <p class="text-xl mt-4 sm:text-2xl sm:mt-8 text-gray-800">Take your web app codebase and transform it into a cross platform desktop app with naitve functionality.</p>
                    <div id="buttons-container" class="mt-12 flex gap-4 flex-col sm:flex-row">
                        <button class="px-8 py-3 font-semibold rounded-lg text-white bg-indigo-900 shadow-sm hover:bg-opacity-90">Donwload now</button>
                        <button class="px-8 py-3 font-semibold rounded-lg bg-gray-600 border border-gray-400 hover:border-gray-900">Read Docs</button>
                    </div>
                </div>
            </div>
        </main>

        @yield('content')

        <script src="{{ asset('js/script.js') }}"></script>
        {{-- <script src="{{ asset('js/room.js') }}"></script> --}}
    </body>
</html>
