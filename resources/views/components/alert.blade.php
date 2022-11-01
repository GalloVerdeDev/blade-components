@props([
    'type' => 'success'
])

@php
    $classes = generateClasses([
        'p-5 shadow font-medium ' . config('blade-components.rounded'),
        'bg-green-100 text-green-800' => $type === 'success',
        'bg-primary-100 text-primary-800' => $type === 'primary',
        'bg-sky-100 text-sky-800' => $type === 'info',
        'bg-red-100 text-red-800' => $type === 'danger',
        'bg-yellow-100 text-yellow-800' => $type === 'warning',
    ]);
@endphp

<x-blade-com::component-wrapper>
    <div {{ $attributes->merge(['class' => $classes]) }}>
        <p>
            {{ $slot }}
        </p>
    </div>
</x-blade-com::component-wrapper>
