@php
    $wrapperClasses = generateClasses([
        'overflow-auto shadow-md ring-1 ring-black ring-opacity-5 ' . config('blade-components.rounded')
    ]);

    $tableClasses = generateClasses([
        'table-auto shadow-md bg-white divide-y min-w-full'
    ]);
@endphp


<x-blade-com::component-wrapper>
    <div {{ $attributes->merge(['class' => $wrapperClasses]) }}>
        <table class="{{ $tableClasses }}">
            @if (isset($headings))
                <thead class="border-b border-gray-200">
                    {{ $headings }}
                </thead>
            @endif

            <tbody class="divide-y-2 divide-gray-100">
                {{ $slot }}
            </tbody>

            @if (isset($footer))
                <tfoot>
                    <tr class="bg-gray-100">
                        {{ $footer }}
                    </tr>
                </tfoot>
            @endif
        </table>
    </div>
</x-blade-com::component-wrapper>
