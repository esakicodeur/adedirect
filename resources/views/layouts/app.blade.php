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

        @livewireStyles

    </head>
    <body>
        <nav class="flex bg-black justify-between items-center position-fixed px-5">
            <div class="flex">
                <a href="{{ route('home') }}" id="brand" class="flex gap-2 items-center">
                    <img src="{{ asset('images/ade.png') }}" alt="" class="w-14 h-14">
                </a>
                <button id="members__button">
                    <x-heroicon-m-users class="h-8 text-white" />
                </button>
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

            <button class="p-2 lg:hidden">
                <div id="nav__links">
                    <button id="chat__button">
                        <x-heroicon-s-chat-bubble-left-right class="h-8 text-white" />
                    </button>
                </div>
            </button>

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
                    <div class="flex flex-col">
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

        @yield('content')

        @livewireScripts

        <script src="{{ asset('js/AgoraRTC_N-4.11.0.js') }}"></script>
        <script src="{{ asset('js/agora-rtm-sdk-1.4.4.js') }}"></script>
        <script src="{{ asset('js/room.js') }}"></script>
        <script src="{{ asset('js/room_rtm.js') }}"></script>
        <script src="{{ asset('js/room_rtc.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
