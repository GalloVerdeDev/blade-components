<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

@props([
    'name',
    'required' => false,
    'id' => $name . '-' . \Illuminate\Support\Str::random(6)
])

<div
    x-data="{
        value: '',
        instance: null,
        init() {
            this.instance = new EditorJS({
                holder: '{{ $id }}',
                onChange: () => {
                    this.instance.save().then((outputData) => {
                        this.value = outputData
                        console.log(this.value)
                    })
                }
            })
        },
    }"
>
    <div x-text="value"></div>
    <input
        type="hidden"
        {{ $attributes->except(['class']) }}
        name="{{ $name }}"
        x-model="value">

    @if ($slot)
        <x-blade-com::label class="mb-2" name="{{ $name }}" required="{{ $required }}">{{ $slot }}</x-blade-com::label>
    @endif

    <div class="mx-auto bg-white">
        <div id="{{ $id }}"></div>
    </div>

    @error($name)
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>

