@props(['data'])

<div class="styled-html">
    <div class="hero">
        @switch($data['layout'])
            @case('image_left')
                <div class="mt-4 max-w-3xl mx-auto py-12">
                    <x-content-block.image_next_to_text :data="[
                        'image_url' => $data['hero_image'],
                        'text' => '<h1>' . $data['h1'] . '</h1><p>' . $data['paragraph'] . '</p>',
                    ]" />
                    <hr class="mt-4 mb-6 max-w-[100px] md:max-w-xl mx-auto opacity-50">
                </div>
            @break

            @case('image_right')
                <div class="mt-2 max-w-3xl mx-auto py-12">

                    <x-content-block.text_next_to_image :data="[
                        'image_url' => $data['hero_image'],
                        'text' => '<h1>' . $data['h1'] . '</h1><p>' . $data['paragraph'] . '</p>',
                    ]" />
                    <hr class="mt-4 mb-6 max-w-[100px] md:max-w-xl mx-auto opacity-50">
                </div>
            @break

            @case('image_above')
                <div class="text-center mt-2 max-w-3xl mx-auto py-12">
                    <img class="m-auto rounded-xl shadow-xl" src="{{ url('/media/' . $data['hero_image']) }}" alt=""
                        srcset="">
                    <h1>{{ $data['h1'] }}</h1>
                    <p>
                        {{ $data['paragraph'] }}
                    </p>
                    <hr class="mt-4 mb-6 max-w-[100px] md:max-w-xl mx-auto opacity-50">
                </div>
            @break

            @case('image_background')
                <div class="h-[50vh] w-full"
                    style="
                    background-image: url('{{ url('/media/' . $data['hero_image']) }}');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;
                    ">
                    <div class="flex items-center justify-center h-full" style="background-color: rgba(0,0,0, .4)">
                        <div class="brightness-200" style="text-shadow: 0px 0px 4px black">
                            <h1>{{ $data['h1'] }}</h1>
                            <p>
                                {{ $data['paragraph'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @break

            @default
        @endswitch
    </div>
</div>