@props([
    'id',
    'width' => 'md',
])

@php
    $contentClasses = generateClasses([
        'pointer-events-auto w-screen',
        'max-w-md' => $width === 'md',
        'max-w-xl' => $width === 'xl',
        'max-w-2xl' => $width === '2xl',
        'max-w-3xl' => $width === '3xl',
        'max-w-4xl' => $width === '4xl',
        'max-w-5xl' => $width === '5xl',
        'max-w-6xl' => $width === '6xl',
        'max-w-7xl' => $width === '7xl',
    ]);
@endphp

<x-blade-com::component-wrapper>
    <div
        x-data="{ open: false }"
        x-show="open"
        x-cloak
        x-on:open-slide-over.window="if ($event.detail.id === '{{ $id }}') open = true"
        x-on:close-slide-over.window="if ($event.detail.id === '{{ $id }}') open = false"
        x-on:keyup.esc="open = false"
        class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">

        <div
            x-show="open"
            x-transition:enter="ease-in-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in-out duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="cursor-pointer fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <div
                        x-show="open"
                        x-transition:enter="transform transition ease-in-out duration-300"
                        x-transition:enter-start="translate-x-full"
                        x-transition:enter-end="translate-x-0"
                        x-transition:leave="transform transition ease-in-out duration-300"
                        x-transition:leave-start="translate-x-0"
                        x-transition:leave-end="translate-x-full"
                        x-on:click.away="open = false"
                        class="{{ $contentClasses }}">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                            <div class="px-4 sm:px-6">
                                <div class="flex items-start justify-between">
                                    @if (isset($title))
                                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">{{ $title }}</h2>
                                    @endif

                                    <div class="ml-3 flex h-7 items-center">
                                        <button x-on:click="open = false" type="button" class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                                            <span class="sr-only">Close panel</span>
                                            <x-heroicon-s-x class="w-6 h-6" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-blade-com::component-wrapper>
