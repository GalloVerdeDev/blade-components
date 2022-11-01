@props([

])

@php
    $classes = generateClasses([
        'border-0 border-t border-gray-300'
    ]);
@endphp

<x-blade-com::component-wrapper>
    <hr {{ $attributes->merge(['class' => $classes]) }} />
</x-blade-com::component-wrapper>
