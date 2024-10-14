<aside class="min-h-screen col-span-1 px-8 bg-white shadow">
    <div class="py-6 space-y-7">
        {{-- Dashboard --}}
        <div>

            <div>
                <x-sidenav.link href="{{ route('admin.manage') }}">
                    <x-heroicon-s-squares-plus class="w-3 text-theme-blue-100" />
                    <span>{{ __('Manage Roles') }}</span>
                </x-sidenav.link>
            </div>

            <div>
                <x-sidenav.link href="{{ route('admin.users') }}">
                    <x-zondicon-user-group class="w-3 text-theme-blue-100" />
                    <span>{{ __('Users') }}</span>
                </x-sidenav.link>
            </div>
        </div>

        {{-- Auth --}}
        <div>
            <x-sidenav.title>
                {{ __('Authentication') }}
            </x-sidenav.title>
            <div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-sidenav.link href="{{ route('logout') }}" onclick="event.preventDefault();                                               this.closest('form').submit();">
                        {{-- <x-heroicon-o-logout class="w-4 text-theme-blue-100" /> --}}
                        <span>{{ __('Se deconnecter') }}</span>
                    </x-sidenav.link>

                </form>

            </div>
        </div>

    </div>
</aside>
