@props([
    'size' => 'lg',
    'image' => null
])

@php
    $classes = generateClasses([
        'bg-white shadow p-6 mx-auto w-full ' . config('blade-components.rounded'),
        'max-w-md' => $size === 'md',
        'max-w-lg' => $size === 'lg',
        'max-w-xl' => $size === 'xl',
        'max-w-2xl' => $size === '2xl',
        'max-w-3xl' => $size === '3xl',
        'max-w-4xl' => $size === '4xl',
        'max-w-5xl' => $size === '5xl',
        'max-w-6xl' => $size === '6xl',
        'max-w-7xl' => $size === '7xl',
        'w-full' => $size === 'full',
    ])
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    <div>
        {{ $slot }}
    </div>
</div>
