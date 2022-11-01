@props([

])

@php
    $classes = generateClasses([
        'flex -space-x-1 overflow-hidden'
    ]);
@endphp

<x-blade-com::component-wrapper>
    <div {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </div>
</x-blade-com::component-wrapper>
