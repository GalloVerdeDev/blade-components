@props([
    'id'
])

@php
    $classes = generateClasses([
        'bg-white shadow ' . config('blade-components.rounded')
    ]);
@endphp

<div x-data="{
        id: '{{ $id }}',
        get expanded() {
            return this.active === this.id
        },
        set expanded(value) {
            this.active = value ? this.id : null
        },
    }" role="region" class="{{ $classes }}">
    <h2>
        <button
            x-on:click="expanded = !expanded"
            :aria-expanded="expanded"
            class="flex items-center justify-between w-full font-medium text-xl px-6 py-4"
        >
            <span>{{ $title }}</span>
            <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
            <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
        </button>
    </h2>

    <div x-show="expanded" x-collapse>
        <div class="pb-4 px-6">
            {{ $slot }}
        </div>
    </div>
</div>
