@props([
    'name',
    'required' => false,
    'toolbar' => true
])

<div
    x-data="{
        value: '',
        init() {

            @if ($toolbar)
                var toolbarOptions = [
                    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                    ['blockquote', 'code-block'],

                    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                    [{ 'direction': 'rtl' }],                         // text direction

                    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

                    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                    [{ 'font': [] }],
                    [{ 'align': [] }],

                    ['clean']                                         // remove formatting button
                ];
            @else
                var toolbarOptions = false
            @endif

            let quill = new Quill(this.$refs.quill, { theme: 'snow', modules: { toolbar: toolbarOptions } })

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
