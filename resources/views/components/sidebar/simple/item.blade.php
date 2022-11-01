@props([
    'icon' => 'dashboard',
    'active' => false,
    'href' => null,
])

@php
    $classes = generateClasses([
        'cursor-pointer rounded group w-full py-2 flex justify-center items-center bg-sky-600 transition relative group',
        'text-white flex-col' => $active,
        'hover:bg-opacity-10 bg-opacity-0 text-slate-600' => !$active,
    ]);

    $iconClasses = generateClasses([
        'w-6 h-6 transition',
        'text-gray-400 group-hover:text-gray-800' => !$active
    ]);
@endphp


<a @if ($href) href="{{ $href }}" @endif class="{{ $classes }}" {{ $attributes->except(['class']) }} x-data="{ tooltip: '{{ $slot }}' }" x-tooltip.placement.right.theme.light="tooltip">
    <x-dynamic-component :component="$icon" class="{{ $iconClasses }}"  />
</a>

