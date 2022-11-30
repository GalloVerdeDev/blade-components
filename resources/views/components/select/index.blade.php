@props([
    'name',
    'label' => null,
    'helperText' => null,
    'required' => false,
])

@php
    $classes = generateClasses([
        'appearance-none w-full border-gray-300 focus:border-transparent shadow-inner px-3 focus:ring-2 py-1.5 focus:ring-primary-600 text-base w-full ' . config('blade-components.rounded')
    ]);
@endphp

<x-blade-com::component-wrapper>
    <div class="flex justify-between">
        @if ($label)
            <x-blade-com::label name="{{ $name }}" required="{{ $required }}">{{ $label }}</x-blade-com::label>
        @endif

        @if ($helperText)
            <span class="text-sm text-gray-600">{{ $helperText }}</span>
        @endif
    </div>

    <select {{ $attributes->merge(['class' => $classes]) }} {{ $attributes->except(['class']) }} name="{{ $name }}" id="{{ $name }}">
        {{ $slot }}
    </select>

    @error($name)
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</x-blade-com::component-wrapper>
