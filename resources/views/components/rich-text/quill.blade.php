@props([
    'name',
    'required' => false
])

<div
    x-data="{
        value: '',
        init() {
            let quill = new Quill(this.$refs.quill, { theme: 'snow' })

            quill.root.innerHTML = this.value

            quill.on('text-change', () => {
                this.value = quill.root.innerHTML
            })
        },
    }"
>
    <input
        type="hidden"
        {{ $attributes->except(['class']) }}
        name="{{ $name }}"
        x-model="value">

    @if ($slot)
        <x-blade-com::label class="mb-2" name="{{ $name }}" required="{{ $required }}">{{ $slot }}</x-blade-com::label>
    @endif

    <div class="mx-auto bg-white">
        <div x-ref="quill" class="h-96"></div>
    </div>

    @error($name)
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
