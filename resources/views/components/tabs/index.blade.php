@props([
    'id' => ''
])

@php
    $classes = generateClasses([
          'bg-white border border-gray-200',
          'rounded-b-sm' => config('blade-components.rounded') === 'rounded-sm',
          'rounded-b' => config('blade-components.rounded') === 'rounded',
          'rounded-b-md' => config('blade-components.rounded') === 'rounded-md',
          'rounded-b-lg' => config('blade-components.rounded') === 'rounded-lg',
          'rounded-b-xl' => config('blade-components.rounded') === 'rounded-xl',
          'rounded-b-2xl' => config('blade-components.rounded') === 'rounded-2xl',
          'rounded-b-3xl' => config('blade-components.rounded') === 'rounded-3xl',
          'rounded-b-full' => config('blade-components.rounded') === 'rounded-full',
    ]);
@endphp

<!-- Tabs -->
<div
    x-data="{
        selectedId: null,
        init() {
            // Set the first available tab on the page on page load.
            this.$nextTick(() => this.select(this.$id('tab', 1)))
        },
        select(id) {
            this.selectedId = id
        },
        isSelected(id) {
            return this.selectedId === id
        },
        whichChild(el, parent) {
            return Array.from(parent.children).indexOf(el) + 1
        }
    }"
    x-id="['tab']"
    class="max-w-3xl mx-auto"
>
    <!-- Tab List -->
    <ul
        x-ref="tablist"
        @keydown.right.prevent.stop="$focus.wrap().next()"
        @keydown.home.prevent.stop="$focus.first()"
        @keydown.page-up.prevent.stop="$focus.first()"
        @keydown.left.prevent.stop="$focus.wrap().prev()"
        @keydown.end.prevent.stop="$focus.last()"
        @keydown.page-down.prevent.stop="$focus.last()"
        role="tablist"
        class="-mb-px flex items-stretch"
    >
        <!-- Tab -->
        {{ $slot }}
    </ul>

    <!-- Panels -->
    <div role="tabpanels"
         class="{{ $classes }}">
        <!-- Panel -->
        @stack('tabs-content-' . $id)
    </div>
</div>
