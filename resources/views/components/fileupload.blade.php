@props([
    'name' => '',
])

<div
    wire:ignore
    x-cloak
    x-data="{ pond: null }"
    x-init="
    $nextTick(function () {
        pond = FilePond.create($refs.files, {
            allowMultiple: true,
            allowDrop: true,
            disabled: false,
            itemInsertLocation: 'after',
            maxFiles: 5,
            maxFileSize: '10MB',
            allowBrowse: true,
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                        @this.upload('{{ $attributes->wire('model')->value() }}', file, load, error, progress);
                    },
                    revert: (filename, load) => {
                        @this.removeUpload('{{ $attributes->wire('model')->value() }}', filename, load);
                    },
                },
        });
    });">
    <input name="{{ $name }}" type="file" x-ref="files" multiple />
</div>
