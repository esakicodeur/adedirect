<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow">
    <!-- Primary Navigation Menu -->
    <div class="px-8">
        <div class="flex justify-between h-20">
            <div class="flex">

                <!-- Logo -->
                <div class="flex items-center w-36">
                    <a href="{{ route('threads.index') }}">
                        <x-logos.main class="block w-auto h-12" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
