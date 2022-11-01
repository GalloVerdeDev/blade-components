@props([
    'action' => null,
    'method' => null,
])

<form method="{{ $method }}" action="{{ $action }}" {{ $attributes->except(['action', 'method']) }}>
    @csrf

    <div {{ $attributes->merge(['class' => 'space-y-6']) }}>
        {{ $slot }}

        @if (isset($buttons))
            <div class="pt-2">
                {{ $buttons }}
            </div>
        @endif
    </div>
</form>
