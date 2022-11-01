@props([
    'name',
])

<x-blade-com::component-wrapper>
    <!-- Toggle -->
    <div
        x-data="{ value: false }"
        {{ $attributes->merge(['class' => 'flex items-center justify-start']) }}
        x-id="['toggle-label']"
    >
        <input
            {{ $attributes->except(['class']) }}
            type="hidden"
            name="{{ $name }}"
            :value="value">

        <!-- Label -->
        <label
            @click="$refs.toggle.click(); $refs.toggle.focus()"
            :id="$id('toggle-label')"
            class="text-gray-900 transition-colors dark:text-white mr-2"
        >
            {{ $slot }}
        </label>

        <!-- Button -->
        <button
            x-ref="toggle"
            @click="value = ! value"
            type="button"
            role="switch"
            :aria-checked="value"
            :aria-labelledby="$id('toggle-label')"
            :class="value ? 'bg-primary-600' : 'bg-gray-200'"
            class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
        >
            <span
                aria-hidden="true"
                :class="value ? 'translate-x-5' : 'translate-x-0'"
                class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
        </button>
    </div>
    </x-blade-com::component-wrapper>
