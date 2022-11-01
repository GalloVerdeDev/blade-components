@props([
    'src',
    'size' => 'md',
    'alt' => '',
    'rounded' => true,
    'stacked' => false,
])

@php
    $classes = generateClasses([
        'inline-block object-cover w-full h-full ',
        'rounded-full' => $rounded,
        'rounded-xl' => !$rounded,
        'h-6 w-6' => $size === 'xs',
        'h-8 w-8' => $size === 'sm',
        'h-10 w-10' => $size === 'md',
        'h-12 w-12' => $size === 'lg',
        'h-14 w-14' => $size === 'xl',
        'ring-2 ring-white' => $stacked
    ]);
@endphp

<x-blade-com::component-wrapper>
    <img {{ $attributes->merge(['class' => $classes]) }} src="{{ $src }}" alt="{{ $alt }}">
</x-blade-com::component-wrapper>
