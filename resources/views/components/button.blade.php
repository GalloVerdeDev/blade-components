@props([
    'type' => 'primary',
    'icon' => null,
    'iconPosition' => 'before',
    'size' => 'md',
    'width' => null,
])

@php
    $buttonClasses = generateClasses([
        'text-white text-center justify-center leading-tight shadow-md flex items-center transition border uppercase font-bold tracking-tight focus:ring-2 focus:ring-offset-2 disabled:opacity-75 ' . config('blade-components.rounded'),
        'flex-row-reverse' => $iconPosition === 'after',
        'px-6 py-2 text-xs' => $size === 'sm',
        'px-6 py-2 text-sm' => $size === 'md',
        'px-6 py-2 text-md' => $size === 'lg',
        'w-full' => $width === 'full',
        'bg-primary-600 border-primary-600 focus:ring-primary-400 hover:bg-primary-700 hover:border-primary' => $type === 'primary',
        'bg-secondary-600 border-secondary-600 focus:ring-secondary-400 hover:bg-secondary-700 hover:border-secondary' => $type === 'secondary',
        'bg-success-600 border-success-600 focus:ring-success-400 hover:bg-success-700 hover:border-success' => $type === 'success',
        'bg-danger-600 border-danger-600 focus:ring-danger-400 hover:bg-danger-700 hover:border-danger' => $type === 'danger',
        'bg-info-600 border-info-600 focus:ring-info-400 hover:bg-info-700 hover:border-info' => $type === 'info',
    ]);

    $iconClasses = generateClasses([
        'text-white',
        'mr-1' => $iconPosition === 'before',
        'ml-1.5' => $iconPosition === 'after',
        'w-4 h-4' => $size === 'sm',
        'w-5 h-5' => $size === 'md',
        'w-6 h-6' => $size === 'lg',
    ]);
@endphp

<x-blade-com::component-wrapper>
    <button
        {{ $attributes->merge(['class' => $buttonClasses]) }}
        {{ $attributes->except(['class']) }}
        @if ($target = $attributes->wire('click')->value)
            wire:loading.attr="disabled"
            wire:target="{{ $target }}"
        @endif
    >

        @if ($target = $attributes->wire('click')->value)
            <span wire:loading wire:target="{{ $target }}">
                <x-blade-com::loading-spinner class="w-4 h-4" />
            </span>
        @endif

        @if ($icon)
            <span
                @if($target = $attributes->wire('click')->value)
                    wire:loading.remove
                    wire:target="{{ $target }}"
                @endif
            >
                <x-dynamic-component :component="$icon" :class="$iconClasses" />
            </span>
        @endif

        {{ $slot }}
    </button>
</x-blade-com::component-wrapper>
