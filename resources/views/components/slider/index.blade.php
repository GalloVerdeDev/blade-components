@props([
    'uuid' => '',
    'perPage' => 1,
    'type' => 'loop',
    'height' => '',
    'speed' => 800,
    'start' => 0,
    'gap' => '0.5rem',
    'padding' => '',
    'arrows' => true,
    'pagination' => true,
    'autoplay' => false,
    'progressBar' => false,
    'interval' => 5000,
    'pauseOnFocus' => true,
    'wheel' => false,
    'cover' => true,
    'videoAutoplay' => false,
    'videoLoop' => false,
    'videoHideControls' => false,
    'muteVideo' => false,
])

<div
    x-data="{
        init() {
            new Splide(this.$refs.splide{{ $uuid }}, {
                perPage: {{ $perPage }},
                gap: '{{ $gap }}',
                type: '{{ $type }}',
                height: '{{ $height }}',
                speed: {{ $speed }},
                start: {{ $start }},
                padding: '{{ $padding }}',
                arrows: '{{ $arrows }}',
                pagination: '{{ $pagination }}',
                autoplay: '{{ $autoplay }}',
                interval: '{{ $interval }}',
                pauseOnFocus: '{{ $pauseOnFocus }}',
                wheel: '{{ $wheel }}',
                waitForTransition: '{{ $wheel }}',
                wheelMinThreshold: 10,
                cover: '{{ $cover }}',
                video: {
                    autoplay: '{{ $videoAutoplay }}',
                    hideControls: '{{ $videoHideControls }}',
                    mute: '{{ $muteVideo }}',
                },
            }).mount( { SplideVideoExtension } )
        },
    }"
>
    <section x-ref="splide{{ $uuid }}" class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                {{ $slot }}
            </ul>
        </div>

        @if ($autoplay && $progressBar)
            <div class="splide__progress">
                <div class="splide__progress__bar">
                </div>
            </div>
        @endif
    </section>
</div>
