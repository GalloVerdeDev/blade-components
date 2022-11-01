@props([
    'active' => false,
    'href' => '#'
])
<!-- Active: "bg-gray-100", Not Active: "" -->
<a href="{{ $href }}"
   @class(['block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition', 'bg-gray-100' => $active])
   role="menuitem"
   tabindex="-1"
   id="user-menu-item-0"
        {{ $attributes }}>
    {{ $slot }}
</a>
