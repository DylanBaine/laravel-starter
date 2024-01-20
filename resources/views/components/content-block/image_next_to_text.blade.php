@props(['data'])
<div class="container">
    <div class="grid md:grid-cols-2 gap-4">

        <img src="{{ url('/media/' . $data['image_url'] ?? '') }}" width="600"
            class="m-auto max-w-full rounded-md shadow-md" alt="{{ $data['image_description'] ?? '' }}">

        <div>
            <div class="flex h-full items-center">
                <div class="styled-html">
                    {!! $data['text'] !!}
                </div>
            </div>
        </div>

    </div>
</div>
