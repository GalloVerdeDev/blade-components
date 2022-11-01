@props([
    'name',
])

@php
    $containerClasses = generateClasses([
        'flex items-center space-x-2'
    ]);

    $checkboxClasses = generateClasses([
        'focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 hover:bg-primary-100 hover:border-gray-400 transition ' . config('blade-components.rounded')
    ]);
@endphp

<x-blade-com::component-wrapper>
    <div {{ $attributes->merge(['class' => $containerClasses]) }}>
        <input class="{{ $checkboxClasses }}" type="checkbox" id="{{ $name }}" name="{{ $name }}" {{ $attributes->except(['class']) }} />

        @if ($slot)
            <x-blade-com::label name="{{ $name }}" class="mt-1">
                {{ $slot }}
            </x-blade-com::label>
        @endif
    </div>
</x-blade-com::component-wrapper>
