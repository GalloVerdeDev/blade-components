@props([
    'active' => null
])


<div x-data="{ active: '{{ $active }}' }" class="mx-auto space-y-4">
    {{ $slot }}
</div>
