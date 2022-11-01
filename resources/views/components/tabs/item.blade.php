@aware([
    'id'
])

@php
    $classes = generateClasses([
        'inline-flex px-5 py-2.5 border-t border-l border-r',
        'rounded-t-sm' => config('blade-components.rounded') === 'rounded-sm',
        'rounded-t' => config('blade-components.rounded') === 'rounded',
        'rounded-t-md' => config('blade-components.rounded') === 'rounded-md',
        'rounded-t-lg' => config('blade-components.rounded') === 'rounded-lg',
        'rounded-t-xl' => config('blade-components.rounded') === 'rounded-xl',
        'rounded-t-2xl' => config('blade-components.rounded') === 'rounded-2xl',
        'rounded-t-3xl' => config('blade-components.rounded') === 'rounded-3xl',
        'rounded-t-full' => config('blade-components.rounded') === 'rounded-full',
    ]);
@endphp

<li>
    <button
        :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
        @click="select($el.id)"
        @mousedown.prevent
        @focus="select($el.id)"
        type="button"
        :tabindex="isSelected($el.id) ? 0 : -1"
        :aria-selected="isSelected($el.id)"
        :class="isSelected($el.id) ? 'border-gray-200 bg-white' : 'border-transparent'"
        class="{{ $classes }}"
        role="tab"
    >{{ $title }}</button>
</li>

@push('tabs-content-' . $id)
    <section
        x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
        :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
        role="tabpanel"
        class="p-8"
    >
        {{ $slot }}
    </section>
@endpush
