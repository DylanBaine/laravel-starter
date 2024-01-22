@props(['data'])
<div class="container">
    <div class="grid-cols-1"></div>
    <div class="grid-cols-2"></div>
    <div class="grid-cols-3"></div>
    <div class="grid gap-2 grid-cols-{{ $data['columns'] }} items-center">
        @foreach ($data['content_blocks'] as $key => $block)
            <div class="col-span-full md:col-span-1">
                <x-dynamic-component component="content-block.{{ $block['type'] }}" :data="$block['data']" />
            </div>
        @endforeach
    </div>
</div>
