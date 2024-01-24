<x-layout title="{{ $page->name }}" noHeader>
    <main>
        @foreach ($page->content_blocks as $key => $block)
            <section @if ($key > 0) class="mb-24" @endif>
                <x-dynamic-component component="content-block.{{ $block['type'] }}" :data="$block['data']" />
            </section>
        @endforeach
    </main>
</x-layout>
