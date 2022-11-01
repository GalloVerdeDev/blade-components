@props([
    'selected' => false,
])

@php
    $classes = generateClasses([
        'group flex items-center space-x-4 rounded-xl py-2 px-4 focus-within:bg-gray-100 hover:bg-gray-200 cursor-pointer',
        'bg-gray-200' => $selected
    ]);
@endphp

<li {{ $attributes->merge(['class' =>$classes]) }} {{ $attributes->except(['class']) }}>
    <div class="h-10 w-10 flex-none rounded-full bg-gray-50 flex justify-center items-center">
        <x-heroicon-o-calendar class="w-4 h-4" />
    </div>
    <div class="flex-auto">
        <p class="text-gray-900">{{ $title }}</p>
        @if (isset($subtitle))
            <p class="mt-0.5">
                {{ $subtitle }}
            </p>
        @endif
    </div>
</li>