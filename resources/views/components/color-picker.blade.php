@props([
    'name' => '',
])

@php
    $classes = generateClasses([

    ]);
@endphp

<x-blade-com::component-wrapper>
    <div>
        <input {{ $name }}>
    </div>
</x-blade-com::component-wrapper>
