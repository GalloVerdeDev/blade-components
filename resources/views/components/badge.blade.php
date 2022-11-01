@props([
    'type' => 'primary',
    'size' => 'md',
    'color' => null,
])

@php
    $classes = generateClasses([
       'text-gray-800 inline-flex justify-center items-center ' . config('blade-components.rounded'),
       'px-2.5 py-0.5 text-xs font-medium' => $size === 'md',
       'px-3 py-0.5 text-sm font-medium' => $size === 'lg',
       'bg-primary-100' => !$color && $type === 'primary',
       'bg-secondary-100' => !$color && $type === 'secondary',
       'bg-success-100' => !$color && $type === 'success',
       'bg-danger-100' => !$color && $type === 'danger',
       'bg-info-100' => !$color && $type === 'info',
    ]);
@endphp

<x-blade-com::component-wrapper>
    <span {{ $attributes->merge(['class' => $classes]) }}
        @if ($color)
            style="background-color: {{ $color }}"
        @endif
        >
        {{ $slot }}
    </span>
</x-blade-com::component-wrapper>
