@props([
    'name',
    'options',
    'required' => false,
    'helperText' => null,
    'placeholder' => null,
])

@php
    $classes = generateClasses([

    ]);
@endphp

<x-blade-com::component-wrapper>
    <div
        wire:ignore
        x-data="{
            multiple: true,
            value: @entangle($attributes->wire('model')),
            options: {{ json_encode($options) }},
            init() {
                this.$nextTick(() => {
                    let choices = new Choices(this.$refs.select, {
                        removeItemButton: true,
                        classNames: {
                            containerOuter: 'choices {{ config('blade-components.rounded') }}',
                        }
                    })

                    let refreshChoices = () => {
                        let selection = this.multiple ? this.value : [this.value]

                        choices.clearStore()
                        choices.setChoices(this.options.map(({ value, label }) => ({
                            value,
                            label,
                            selected: selection.includes(value),
                        })))
                    }

                    refreshChoices()

                    this.$refs.select.addEventListener('change', () => {
                        this.value = choices.getValue(true)
                    })

                    this.$watch('value', () => refreshChoices())
                    this.$watch('options', () => refreshChoices())
                })
            }
        }"
    >
        <div class="flex justify-between">
            @if ($slot)
                <x-blade-com::label name="{{ $name }}" required="{{ $required }}">{{ $slot }}</x-blade-com::label>
            @endif

            @if ($helperText)
                <span class="text-sm text-gray-600">{{ $helperText }}</span>
            @endif
        </div>

        <select x-ref="select" :multiple="multiple" name="{{ $name }}"></select>

        @error($name)
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>
</x-blade-com::component-wrapper>
