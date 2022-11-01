@props([
    'icon' => null
])

@php
    $classes = generateClasses([
        'max-w-lg mx-auto flex flex-col items-center justify-center space-y-4'
    ]);
@endphp

<x-blade-com::component-wrapper>
    <div {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)
            <span class="inline-block mx-auto text-center bg-gray-300 bg-opacity-80 rounded-full p-1.5">
                <x-dynamic-component :component="$icon" class="w-6 h-6" />
            </span>
        @endif

        <div>
            {{ $slot }}
        </div>

        @if (isset($actions))
            {{ $actions }}
        @endif
    </div>
</x-blade-com::component-wrapper>
