@props([
    'active' => false,
    'icon' => 'heroicon-o-home',
    'href' => ''
])

<a href="{{ $href }}"
        @class([
         'hover:bg-primary-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md transition',
         'text-gray-300' => !$active,
         'bg-primary-700 text-white font-bold' => $active])>
    <span
        @class([
            'group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6 transition',
            'text-gray-300' => !$active,
            'text-white' => $active
        ])>

        <x-dynamic-component
            :component="$icon" />
    </span>
    {{ $slot }}
</a>

