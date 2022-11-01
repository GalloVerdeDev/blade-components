@props([
    'flat' => false
])

@php
    $classes = generateClasses([
        'md:flex justify-between items-center space-y-2 md:space-y-0 bg-white shadow p-4 ' . config('blade-components.rounded')
    ]);
@endphp

<x-blade-com::component-wrapper>
    <div {{ $attributes->merge(['class' => $classes]) }}>
        <div>
            <x-blade-com::headline type="h4">
                {{ $heading }}
            </x-blade-com::headline>

            <div class="text-gray-600 text-sm md:mt-1.5">
                {{ $slot }}
            </div>
        </div>

        <div>
            {{ $action }}
        </div>
    </div>
</x-blade-com::component-wrapper>
