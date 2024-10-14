<nav class="p-3 flex bg-white justify-between items-center">
    <a href="{{ route('home') }}" id="brand" class="flex gap-2 items-center">
        <img src="{{ asset('img/logos/ade.png') }}" alt="" class="w-14 h-14">
    </a>

    <div id="nav-menu" class="hidden lg:flex gap-12">
        <!-- Navigation Links -->

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            {{-- Home --}}
            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Acceuil') }}
            </x-nav-link>

            {{-- Home --}}
            <x-nav-link href="{{ route('live') }}"  :active="request()->routeIs('live')">
                {{ __('Live') }}
            </x-nav-link>
        </div>
    </div>

    <div class="hidden lg:flex gap-5 items-center">
        @auth
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="hidden h-16 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

                <div class="relative ml-3">
                    <div align="right" width="48"  class="inline-flex rounded-md">
                        <span>
                            <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                {{ Auth::user()->name }}
                            </button>
                        </span>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();" class="bg-black text-white font-bold rounded-lg px-4 py-2 mx-3">
                                {{ __('Se deconnecter') }}
                            </a>
                        </form>
                    </div>
                </div>

            </div>
            @else
            <div class="flex">
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    {{-- Login --}}
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>

                    {{-- Register --}}
                    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-nav-link>
                </div>
            </div>
            @endauth
    </div>

    <button class="p-2 bg-white lg:hidden" onclick="handleMenu()">
        <x-zondicon-menu class="text-gray-900 h-8" />
    </button>

    <div id="nav-dialog" class="hidden fixed z-10 md:hidden bg-white inset-0 p-3">
        <div id="nav-bar" class="flex justify-between">
            <a href="{{ route('home') }}" id="brand" class="flex gap-2 items-center">
                <img src="{{ asset('img/logos/ade.png') }}" alt="" class="w-16 h-16">
            </a>

            <button class="p-2 bg-white md:hidden" onclick="handleMenu()">
                <x-zondicon-close class="text-gray-900 h-8" />
            </button>
        </div>

        <div class="mt-6">
            <!-- Navigation Links -->

                {{-- Home --}}
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Acceuil') }}
                </x-nav-link>

                {{-- Home --}}
                <x-nav-link href=""  :active="request()->routeIs('live')">
                    {{ __('Live') }}
                </x-nav-link>

        <div class="h-[1px] bg-gray-300"></div>

        <div class="w-full mt-6 flex flex-col gap-2">
            @auth
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                <div class="relative ml-3">
                    <div align="right" width="48"  class="inline-flex rounded-md">
                        <span>
                            <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                {{ Auth::user()->name }}
                            </button>
                        </span>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();" class="bg-black text-white font-bold rounded-lg px-4 py-2 mx-3">
                                {{ __('Se deconnecter') }}
                            </a>
                        </form>
                    </div>
                </div>
            @else
            <div class="flex">
                    {{-- Login --}}
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>

                    {{-- Register --}}
                    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-nav-link>
            </div>
            @endauth
        </div>
    </div>
</nav>
