@props([
    'required' => false,
    'name' => '',
])

<label {{ $attributes->merge(['class' => 'block text-sm font-bold text-gray-500 mb-1 tracking-tight']) }} for="{{ $name }}">
    {{ $slot }}
    @if ($required) <span class="text-red-600">*</span> @endif
</label>
