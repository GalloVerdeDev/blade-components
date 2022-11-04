@props([
    'align' => 'left'
])

@php
    $classes = generateClasses([
        'font-semibold text-sm uppercase py-2 px-6 text-gray-800 bg-gray-100',
        'text-left' => $align === 'left',
        'text-center' => $align === 'center',
        'text-right' => $align === 'right',
    ]);
@endphp

<th {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</th>
