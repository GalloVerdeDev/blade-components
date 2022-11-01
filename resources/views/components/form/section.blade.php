@props([

])

@php
    $classes = generateClasses([

    ]);
@endphp

<x-blade-com::component-wrapper>
    <div>
        <div class="mb-6">
            <p class="font-medium">{{ $heading }}</p>

            @if (isset($description))
                <div class="text-sm text-gray-600">{{ $description }}</div>
            @endif

        </div>

        <div class="space-y-6">
            {{ $slot }}
        </div>
    </div>
</x-blade-com::component-wrapper>
