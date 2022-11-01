@props([
    'type' => 'h2',
])

@php
    $classes = generateClasses([
        'text-primary-800 font-semibold',
        'text-3xl lg:text-4xl' => $type === 'h1',
        'text-2xl lg:text-3xl' => $type === 'h2',
        'text-xl lg:text-2xl' => $type === 'h3',
        'text-lg lg:text-xl' => $type === 'h4',
        'text-md lg:text-lg' => $type === 'h5',
        'text-md lg:text-lg' => $type === 'h6',
    ]);
@endphp

<x-blade-com::component-wrapper>
    @switch($type)
        @case('h1')
            <h1 {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</h1>
            @break

        @case('h2')
            <h2 {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</h2>
            @break

        @case('h3')
            <h3 {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</h3>
            @break

        @case('h4')
            <h4 {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</h4>
            @break

        @case('h5')
            <h5 {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</h5>
            @break

        @case('h6')
            <h6 class="{{ $classes}}">{{ $slot }}</h6>
            @break
    @endswitch
</x-blade-com::component-wrapper>
