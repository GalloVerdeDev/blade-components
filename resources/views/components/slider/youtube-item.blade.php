@props([
    'src'
])

<li class="splide__slide flex flex-col items-center justify-center pb-8" data-splide-youtube="{{ $src }}">
    {{ $slot }}
</li>
