@props([
    'align' => 'left',
    'light' => false,
])

@php
    $classes = generateClasses([
        'p-2 whitespace-nowrap h-full',
        'text-left' => $align === 'left',
        'text-center' => $align === 'center',
        'text-right' => $align === 'right',
        'text-gray-800' => !$light,
        'text-gray-600' => $light
    ]);
@endphp

<td {{ $attributes->merge(['class' => $classes]) }} {{ $attributes->except(['class']) }}>
    {{ $slot }}
</td>
