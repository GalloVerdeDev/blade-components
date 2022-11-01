@props([
    'name',
    'flat' => false,
    'inline' => false,
])

<!-- Radio Group -->
<div
    x-data="{
        value: null,
        select(option) { this.value = option },
        isSelected(option) { return this.value === option },
        hasRovingTabindex(option, el) {
            // If this is the first option element and no option has been selected, make it focusable.
            if (this.value === null && Array.from(el.parentElement.children).indexOf(el) === 0) return true

            return this.isSelected(option)
        },
        selectNext(e) {
            let el = e.target
            let siblings = Array.from(el.parentElement.children)
            let index = siblings.indexOf(el)
            let next = siblings[index === siblings.length - 1 ? 0 : index + 1]

            next.click(); next.focus();
        },
        selectPrevious(e) {
            let el = e.target
            let siblings = Array.from(el.parentElement.children)
            let index = siblings.indexOf(el)
            let previous = siblings[index === 0 ? siblings.length - 1 : index - 1]

            previous.click(); previous.focus();
        },
    }"
    @keydown.down.stop.prevent="selectNext"
    @keydown.right.stop.prevent="selectNext"
    @keydown.up.stop.prevent="selectPrevious"
    @keydown.left.stop.prevent="selectPrevious"
    role="radiogroup"
    :aria-labelledby="$id('radio-group-label')"
    x-id="['radio-group-label']"
>
    <input
        {{ $attributes->except(['class']) }}
        type="hidden"
        name="{{ $name }}"
        :value="value">

    <!-- Radio Group Label -->
    <label :id="$id('radio-group-label')" role="none" class="hidden">Backend framework: <span x-text="value"></span></label>

    <div class="mt-4 space-y-2">
        {{ $slot }}
    </div>

    @error($name)
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
