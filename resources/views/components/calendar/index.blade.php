@props([
    'currentDate',
    'selectedDate',
])

<!-- This example requires Tailwind CSS v2.0+ -->
<div
     class="lg:grid lg:grid-cols-2 lg:divide-x lg:divide-gray-200 font-sans">
    <div class="lg:pr-14">
        <div class="flex items-center">
            <h2 class="flex-auto font-semibold text-gray-900">{{ $currentDate->format('F') }} {{ $currentDate->format('Y') }}</h2>
            <button type="button" class="-my-1.5 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
                <span class="sr-only">Previous month</span>
                {{ $prevMonthButton }}
            </button>
            <button type="button" class="-my-1.5 -mr-1.5 ml-2 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
                <span class="sr-only">Next month</span>
                {{ $nextMonthButton }}
            </button>
        </div>
        <div class="mt-10 grid grid-cols-7 text-center text-xs leading-6 text-gray-500">
            <div>M</div>
            <div>T</div>
            <div>W</div>
            <div>T</div>
            <div>F</div>
            <div>S</div>
            <div>S</div>
        </div>
        <div class="mt-2 grid grid-cols-7 text-sm">
            {{ $days }}
        </div>
    </div>
    <section class="mt-12 lg:mt-0 lg:pl-14">
        <h2 class="font-semibold text-gray-900">Schedule for <time datetime="2022-01-21">{{ $selectedDate }}</time></h2>
        @if (isset($eventItems))
            <ol class="mt-4 space-y-1 text-sm leading-6 text-gray-500">
                {{ $eventItems }}
            </ol>
        @endif
    </section>
</div>
