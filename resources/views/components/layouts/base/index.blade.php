@props([
    'profileImage' => null,
])

<div x-data="{ navOpen: false, profileMenuOpen: false }">
    {{ $sidebar }}

    <div class="md:pl-64 flex flex-col">
        @if (isset($message))
            <div class="bg-primary-900 text-center text-white py-2 font-bold">
                {{ $message }}
            </div>
        @endif
        <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
            <button x-on:click="navOpen = !navOpen" type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500 md:hidden">
                <span class="sr-only">Open sidebar</span>
                <x-heroicon-o-menu-alt-2 class="h-6 w-6" />
            </button>
            <div class="flex-1 px-4 flex justify-end">
                <div class="ml-4 flex items-center justify-end md:justify-between md:ml-4 w-full">
                    @if (isset($title))
                        <div class="hidden md:block text-xl font-bold">
                            {{ $title }}
                        </div>
                    @endif

                    <div class="flex items-center">
                        @if (isset($welcomeMessage))
                            <p class="mr-2 text-sm">
                                {{ $welcomeMessage }}
                            </p>
                        @endif

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button x-on:click="profileMenuOpen = !profileMenuOpen" type="button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="{{ $profileImage ?? '' }}" alt="">
                                </button>
                            </div>

                            @if (isset($profileMenuItems))
                                <div
                                    x-cloak
                                    x-show="profileMenuOpen"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    {{ $profileMenuItems }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="flex-1">
            <div class="py-6">

                <div class="w-full mx-auto px-4 sm:px-6 md:px-8">
                    @if (isset($title))
                        <h1 class="md:hidden text-xl font-semibold text-gray-900">{{ $title }}</h1>
                    @endif

                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
</div>
