@props([
    'name',
    'placeholder',
    'type' => 'text',
    'required' => false,
    'icon' => null,
    'iconPosition' => 'before',
    'helperText' => null,
    'prefix' => null,
    'postfix' => null,
])

@php
    $classes = generateClasses([
        'appearance-none w-full border-gray-300 focus:border-transparent shadow-sm sm:text-sm px-3 focus:ring-2 py-2 focus:ring-primary-600 w-full ' . config('blade-components.rounded'),
        'rounded-l-none' => $prefix,
        'rounded-r-none' => $postfix,
        'pl-9' => $icon && $iconPosition === 'before',
        'pr-9' => $icon && $iconPosition === 'after',
    ]);

    $iconClasses = generateClasses([
        'absolute inset-y-0 flex items-center pointer-events-none text-gray-500 group-focus-within:text-gray-800',
        'left-0 pl-2.5' => $iconPosition === 'before',
        'right-0 pr-2.5' => $iconPosition === 'after',
    ]);
@endphp

<x-blade-com::component-wrapper>
    <div class="flex justify-between">
        @if ($slot)
            <x-blade-com::label name="{{ $name }}" required="{{ $required }}">{{ $slot }}</x-blade-com::label>
        @endif

        @if ($helperText)
            <span class="text-sm text-gray-600">{{ $helperText }}</span>
        @endif
    </div>

    <div class="flex">
        <div class="relative w-full flex group">
            @if ($prefix)
                <div class="bg-gray-200 text-gray-600 border border-r-0 border-gray-300 rounded-l-md flex items-center justify-center px-3 group-focus-within:text-black">
                    {{ $prefix }}
                </div>
            @endif

            @if ($icon)
                <span class="{{ $iconClasses }}">
                    <x-dynamic-component :component="$icon" class="w-5 h-5" />
                </span>
            @endif

            <input
                type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $name }}"
                {{ $attributes->merge(['class' => $classes]) }}
                {{ $attributes->except(['class']) }}
                placeholder="{{ $placeholder ?? $slot }}" />

            @if (!$postfix && !in_array($type, ['color', 'number', 'search']))
                @error($name)
                    <span @class([
                        'absolute inset-y-0 flex items-center pointer-events-none right-0 pr-3 text-red-600',
                        'right-6' => $icon && $iconPosition === 'after',
                    ])>
                        <x-heroicon-s-exclamation-circle class="w-5 h-5" />
                    </span>
                @enderror
            @endif

            @if ($postfix)
                <div class="bg-gray-200 text-gray-600 border border-l-0 border-gray-300 rounded-r-md flex items-center justify-center px-3 group-focus-within:text-black">
                    {{ $postfix }}
                </div>
            @endif
        </div>

        @if (isset($actions))
            <div class="w-auto flex space-x-4 ml-4">
                {{ $actions }}
            </div>
        @endif
    </div>

    @error($name)
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</x-blade-com::component-wrapper>
