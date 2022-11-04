@props([
    'src',
    'light' => false,
])

@php
    $classes = generateClasses([
        'py-2 px-6 whitespace-nowrap',
        'text-gray-800' => !$light,
        'text-gray-600' => $light
    ]);

    $avatarClasses = generateClasses([
        'flex items-center space-x-2'
    ]);
@endphp

<td {{ $attributes->merge(['class' => $classes]) }} {{ $attributes->except(['class']) }}>
    <div class="{{ $avatarClasses }}">
        <span class="flex-shrink-0">
            <x-blade-com::avatar src="{{ $src }}" size="xs" />
        </span>

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
