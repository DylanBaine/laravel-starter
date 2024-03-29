@props(['data'])

@php
    $showCta = $data['show_cta'];
@endphp

<div class="styled-html">
    <div class="hero"
        style="
            background-size: 30em;
            background-image: url(https://www.transparenttextures.com/patterns/asfalt-dark.png)
        ">
        @switch($data['layout'])
            @case('image_left')
                <div class="mt-4 max-w-4xl mx-auto py-12 px-4">
                    <x-content-block.image_next_to_text :data="[
                        'image_url' => $data['hero_image'],
                        'text' => '<h1>' . $data['h1'] . '</h1><p>' . $data['paragraph'] . '</p>',
                    ]" />
                    @if ($showCta)
                        <div class="mt-4">
                            <x-content-block.call_to_action />
                        </div>
                    @endif
                </div>
            @break

            @case('image_right')
                <div class="mt-2 max-w-4xl mx-auto py-12 px-4">
                    <x-content-block.text_next_to_image :data="[
                        'image_url' => $data['hero_image'],
                        'text' => '<h1>' . $data['h1'] . '</h1><p>' . $data['paragraph'] . '</p>',
                    ]" />
                    @if ($showCta)
                        <div class="mt-4">
                            <x-content-block.call_to_action />
                        </div>
                    @endif
                </div>
            @break

            @case('image_above')
                <div class="text-center mt-2 max-w-3xl mx-auto py-12 px-4">
                    @isset($data['hero_image'])
                        <img class="m-auto rounded-xl shadow-xl" src="{{ url('/media/' . $data['hero_image']) }}" alt=""
                            srcset="">
                    @endisset
                    @isset($data['h1'])
                        <h1>{{ $data['h1'] }}</h1>
                    @endisset
                    <p>
                        {!! $data['paragraph'] !!}
                    </p>
                    @if ($showCta)
                        <div class="mt-4">
                            <x-content-block.call_to_action />
                        </div>
                    @endif
                </div>
            @break

            @case('image_background')
                <div class="w-full"
                    style="
                    background-image: url('{{ url('/media/' . $data['hero_image']) }}');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                    ">
                    <div class="flex items-center justify-center min-h-[50vh] h-full py-4"
                        style="background-color: rgba(0,0,0, .4)">
                        <div style="text-shadow: 0px 0px 4px rgba(0,0,0,.5)">
                            <div class="brightness-200 p-4 mx-auto max-w-4xl">
                                <h1 class="text-white">{{ $data['h1'] }}</h1>
                                <div class="text-white">
                                    {!! $data['paragraph'] !!}
                                </div>
                            </div>
                            @if ($showCta)
                                <div class="mt-4">
                                    <x-content-block.call_to_action />
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @break

            @default
        @endswitch
    </div>
</div>
