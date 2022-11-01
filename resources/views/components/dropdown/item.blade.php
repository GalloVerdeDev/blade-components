@props([
    'icon' => null,
])

@php
    $classes = generateClasses([
        'cursor-pointer block w-full px-4 py-2 text-left text-sm hover:bg-gray-50 disabled:text-gray-500 inline-flex space-x-2 w-full',
    ]);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }} {{ $attributes->except(['class']) }}>
    @if ($icon)
        <x-dynamic-component :component="$icon" class="w-5 w-5" />
    @endif

    <span>
        {{ $slot }}
    </span>
</div>
