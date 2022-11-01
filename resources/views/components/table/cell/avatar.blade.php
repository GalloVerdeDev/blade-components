@props([
    'src',
    'light' => false,
])

@php
    $classes = generateClasses([
        'p-2 whitespace-nowrap',
        'text-gray-800' => !$light,
        'text-gray-600' => $light
    ]);

    $avatarClasses = generateClasses([
        'flex items-center space-x-2'
    ]);
@endphp

<td {{ $attributes->merge(['class' => $classes]) }} {{ $attributes->except(['class']) }}>
    <div class="{{ $avatarClasses }}">
        <x-blade-com::avatar src="{{ $src }}" size="xs" />

        <div>
            {{ $slot }}

            @if (isset($details))
                <div class="text-sm text-gray-600">
                    {{ $details }}
                </div>
            @endif
        </div>
    </div>
</td>
