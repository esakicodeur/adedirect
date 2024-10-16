<aside class="min-h-screen col-span-1 px-8 bg-white shadow hidden lg:block md:block">
    <div class="py-6 space-y-7">
        {{-- Dashboard --}}
        <div>
            <x-sidenav.title>
                {{ __('Administration') }}
            </x-sidenav.title>
            <div>
                <x-sidenav.link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    <x-zondicon-user class="w-3 text-green-400" />
                    <span>{{ __('Profil') }}</span>
                </x-sidenav.link>
            </div>
            <div>
                <x-sidenav.link href="{{ route('users') }}" :active="request()->routeIs('users')">
                    <x-zondicon-user-group class="w-3 text-green-400" />
                    <span>{{ __('Utilisateurs') }}</span>
                </x-sidenav.link>
            </div>
            <div>
                <x-sidenav.link href="{{ route('dashboard.notifications.index') }}" :active="request()->routeIs('dashboard.notifications.index')">
                    <x-zondicon-notifications-outline class="w-3 text-green-400" />
                    <span>{{ __('Notifications') }}</span>
                </x-sidenav.link>
            </div>
        </div>

        @if (auth()->user()->isAdmin())
        {{-- Categories --}}
        <div>
            <x-sidenav.title>
                {{ __('Catégories') }}
            </x-sidenav.title>
            <div>
                <x-sidenav.link href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories.index')">
                    <x-zondicon-view-tile class="w-3 text-green-400" />
                    <span>{{ __('Index') }}</span>
                </x-sidenav.link>
            </div>
            <div>
                <x-sidenav.link href="{{ route('admin.categories.create') }}" :active="request()->routeIs('admin.categories.create')">
                    <x-zondicon-compose class="w-3 text-green-400" />
                    <span>{{ __('Créer') }}</span>
                </x-sidenav.link>
            </div>
        </div>
        @endif

        @if (auth()->user()->isAdmin())
        {{-- Tags --}}
        <div>
            <x-sidenav.title>
                {{ __('Tags') }}
            </x-sidenav.title>
            <div>
                <x-sidenav.link href="{{ route('admin.tags.index') }}" :active="request()->routeIs('admin.tags.index')">
                    <x-zondicon-view-tile class="w-3 text-green-400" />
                    <span>{{ __('Index') }}</span>
                </x-sidenav.link>
            </div>
            <div>
                <x-sidenav.link href="{{ route('admin.tags.create') }}" :active="request()->routeIs('admin.tags.create')">
                    <x-zondicon-compose class="w-3 text-green-400" />
                    <span>{{ __('Créer') }}</span>
                </x-sidenav.link>
            </div>
        </div>
        @endif

        {{-- Threads --}}
        <div>
            <x-sidenav.title>
                {{ __('Sujets') }}
            </x-sidenav.title>
            <div>
                <x-sidenav.link href="{{ route('threads.index') }}" :active="request()->routeIs('threads.index')">
                    <x-zondicon-view-tile class="w-3 text-green-400" />
                    <span>{{ __('Index') }}</span>
                </x-sidenav.link>
            </div>
        </div>

        {{-- Threads --}}
        <div>
            <x-sidenav.title>
                {{ __('Authentification') }}
            </x-sidenav.title>
            <div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-sidenav.link href="{{ route('logout') }}" onclick="event.preventDefault();                                               this.closest('form').submit();">
                        <x-heroicon-o-logout class="w-4 text-green-400" />
                        <span>{{ __('Se déconnecter') }}</span>
                    </x-sidenav.link>

                </form>

            </div>
        </div>

    </div>
</aside>
