@aware([
    'name',
    'value',
    'flat',
    'inline',
])

@php
    $classes = generateClasses([
        'flex cursor-pointer rounded-md p-4 group',
        'bg-white shadow border border-gray-200' => !$flat,
        'py-1' => $inline && $flat,
    ]);
@endphp

<div
    x-data="{ option: '{{ $value }}' }"
    @click="select(option)"
    @keydown.enter.stop.prevent="select(option)"
    @keydown.space.stop.prevent="select(option)"
    :aria-checked="isSelected(option)"
    :tabindex="hasRovingTabindex(option, $el) ? 0 : -1"
    :aria-labelledby="$id('radio-option-label')"
    :aria-describedby="$id('radio-option-description')"
    x-id="['radio-option-label', 'radio-option-description']"
    role="radio"
    {{ $attributes->merge(['class' => $classes]) }}
>
    <!-- Checked Indicator -->
    <span
        :class="{ 'bg-primary-400 ring-2 ring-primary-400 ': isSelected(option) }"
        class="inline-flex items-center justify-center shrink-0 mt-1 w-4 h-4 rounded-full border-2 border-white ring-1 ring-gray-600 transition"
        aria-hidden="true"
    ></span>

    <input type="radio" class="sr-only" name="{{ $name }}" value="{{ $value }}">

    <span
        @class([
            'ml-3',
            'flex items-center' => $inline
        ])>
        <!-- Primary Label -->
        <p :id="$id('radio-option-label')">{{ $slot }}</p>

        @if (isset($description))
            <!-- Secondary Information -->
            <span :id="$id('radio-option-description')"
                @class([
                    'text-sm',
                    'mt-2' => !$inline,
                    'text-gray-600 ml-2' => $inline
                ])>
                {{ $description }}
            </span>
        @endif
    </span>
</div>
