<nav x-data="{ open: false }" class="border-b border-gray-100 shadow overlay">
    <!-- Primary Navigation Menu -->
    <div class="px-8">
        <div class="relative flex justify-between h-20">
            <div class="flex">

                <!-- Logo -->
                <div class="flex items-center w-36">
                    <a href="{{ route('home') }}">
                        <x-logos.main class="block w-auto h-12" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('home') }}">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="relative ml-3 mt-6">
                <div align="right" width="48"  class="inline-flex rounded-md">
                    <span class="text-black text-sm">
                        {{ Auth::user()->name }}
                    </span>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" class="bg-black text-white font-bold rounded-lg px-4 py-2 mx-3 mt-2">
                            {{ __('Se deconnecter') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
