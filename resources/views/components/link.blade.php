@props([
    'href' => null
])

@php
    $classes = generateClasses([
        'text-gray-600 hover:text-primary-600 transition text-sm'
    ]);
@endphp

<x-blade-com::component-wrapper>
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</x-blade-com::component-wrapper>
