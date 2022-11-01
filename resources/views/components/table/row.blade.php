@php
    $classes = generateClasses([
       'hover:bg-gray-50 transition',
    ]);
@endphp

<tr {{ $attributes->merge(['class' => $classes]) }} {{ $attributes->except(['class']) }}>
    {{ $slot }}
</tr>
