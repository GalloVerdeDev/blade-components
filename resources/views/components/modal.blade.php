@props([
    'id',
    'width' => 'sm',
])

@php
    $classes = generateClasses([
        'relative w-full bg-white shadow-lg overflow-y-auto ' . config('blade-components.rounded'),
        'max-w-sm' => $width === 'sm',
        'max-w-md' => $width === 'md',
        'max-w-lg' => $width === 'lg',
        'max-w-xl' => $width === 'xl',
        'max-w-2xl' => $width === '2xl',
        'max-w-3xl' => $width === '3xl',
        'max-w-4xl' => $width === '4xl',
        'max-w-5xl' => $width === '5xl',
        'max-w-6xl' => $width === '6xl',
        'max-w-7xl' => $width === '7xl',
        'max-w-full' => $width === 'full',
    ]);
@endphp

<x-blade-com::component-wrapper>
    <div
        x-data="{ open: false }"
        x-on:open-modal.window="if ($event.detail.id === '{{ $id }}') open = true"
        x-on:close-modal.window="if ($event.detail.id === '{{ $id }}') open = false"
        class="flex justify-center">

        <!-- Modal -->
        <div
            x-show="open"
            style="display: none"
            x-on:keydown.escape.prevent.stop="open = false"
            role="dialog"
            aria-modal="true"
            x-id="['{{ $id }}']"
            :aria-labelledby="$id('{{ $id }}')"
            class="fixed inset-0 overflow-y-auto z-50"
        >
            <!-- Overlay -->
            <div x-show="open" x-transition.opacity.duration.200ms class="fixed inset-0 bg-black bg-opacity-50"></div>

            <!-- Panel -->
            <div
                x-transition:enter="ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-0 sm:translate-y-20"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-0 sm:translate-y-20"
                x-show="open"
                x-on:click="open = false"
                class="transition relative min-h-screen flex items-end md:items-center justify-center p-4"
            >
                <div
                    x-on:click.stop
                    x-trap.noscroll.inert="open"
                    class="{{ $classes }}"
                >
                    @if (isset($header))
                        <div class="bg-gray-100 border-b border-gray-200 px-6 py-4">
                            {{ $header }}
                        </div>
                    @endif
                    <div class="p-6">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-blade-com::component-wrapper>
