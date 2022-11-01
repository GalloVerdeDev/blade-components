@props([
    'selected' => false,
    'today' => false,
    'currentMonth' => false,
    'hasEvents' => false,
])

@php
    $classes = generateClasses([
        'mx-auto flex h-8 w-8 items-center justify-center rounded-full',
        'text-white' => $selected,
        'text-primary-600' => !$selected && $today,
        'text-gray-900' => !$selected && !$today && $currentMonth,
        'text-gray-400' => !$selected && !$today && !$currentMonth,
        'bg-primary-600' => $selected && $today,
        'bg-gray-900' => $selected && !$today,
        'hover:bg-gray-200' => !$selected,
        'font-semibold' => $selected || $today
    ]);
@endphp

<div class="py-2 relative border-gray-200 [&:nth-child(n+8)]:border-t">
    @if ($hasEvents)
        <span class="absolute top-2 left-2 inline-block w-2 h-2 rounded-full bg-primary-600"></span>
    @endif
    <button type="button" {{ $attributes->merge(['class' => $classes]) }} {{ $attributes->except(['class']) }}>
        <time datetime="2021-12-27">{{ $slot }}</time>
    </button>
</div>