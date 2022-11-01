@props([
    'name',
    'placeholder',
    'required' => false,
    'helperText' => null
])

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
        <textarea
            name="{{ $name }}"
            id="{{ $name }}"
            {{ $attributes->merge(['class' => 'appearance-none resize-none w-full shadow-sm border-gray-300 focus:border-transparent transition px-4 focus:ring-2 focus:ring-primary-600 sm:text-sm w-full '  . config('blade-components.rounded')]) }}
            {{ $attributes->except(['class']) }}
            placeholder="{{ $placeholder ?? $slot }}"></textarea>
    </div>

    @error($name)
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</x-blade-com::component-wrapper>
