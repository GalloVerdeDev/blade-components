@props([
    'type' => 'primary',
    'icon' => null,
    'size' => 'md',
])

@php
    $buttonClasses = generateClasses([
        'p-1 rounded-full text-white text-center justify-center leading-tight flex items-center transition border border-transparent uppercase font-bold tracking-tight focus:ring-2 focus:ring-offset-2',
        'w-8 h-8' => $size === 'sm',
        'w-9 h-9' => $size === 'md',
        'w-10 h-10' => $size === 'lg',
        'focus:ring-primary-100 hover:bg-primary-100 hover:border-primary-100' => $type === 'primary',
        'focus:ring-secondary-100 hover:bg-secondary-100 hover:border-secondary-100' => $type === 'secondary',
        'focus:ring-success-100 hover:bg-success-100 hover:border-success-100' => $type === 'success',
        'focus:ring-danger-100 hover:bg-danger-100 hover:border-danger-100' => $type === 'danger',
        'focus:ring-info-100 hover:bg-info-100 hover:border-info-100' => $type === 'info',
    ]);

    $iconClasses = generateClasses([
        'text-primary-600' => $type === 'primary',
        'text-secondary-600' => $type === 'secondary',
        'text-success-600' => $type === 'success',
        'text-danger-600' => $type === 'danger',
        'text-info-600' => $type === 'info',
        'w-5 h-5' => $size === 'sm',
        'w-6 h-6' => $size == 'md',
        'w-7 h-7' => $size == 'lg',
    ]);
@endphp

<x-blade-com::component-wrapper>
    <button {{ $attributes->merge(['class' => $buttonClasses]) }} {{ $attributes->except(['class']) }}>
        <x-dynamic-component :component="$icon" :class="$iconClasses" />
    </button>
</x-blade-com::component-wrapper>
