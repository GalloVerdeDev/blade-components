@props([
    'action' => null,
    'method' => null,
])

<form method="{{ $method }}" action="{{ $action }}" {{ $attributes->except(['action', 'method']) }}>
    @csrf

    <div {{ $attributes->merge(['class' => 'space-y-4']) }}>
        {{ $slot }}

        @if (isset($buttons))
            <div>
                {{ $buttons }}
            </div>
        @endif
    </div>
</form>
