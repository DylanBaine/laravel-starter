@props(['data'])
{{-- @dd($data) --}}
<div class="container @container">
    <div class="max-w-2xl mx-auto pl-4 border-l-2 border-accent relative">
        <div class="relative z-10">
            <span class="text-[10em] leading-[.7em] absolute top-0 left-0 opacity-20 font-serif">&ldquo;</span>
            <span class="text-[10em] leading-[.7em] absolute top-0 right-0 opacity-20 font-serif">&rdquo;</span>
        </div>
        <div class="pl-8 pr-6 py-6 pt-3 relative z-20 brightness-150 font-semibold">
            <div class="grid @sm:grid-cols-2 gap-2">
                @if ($hasImage = isset($data['image']) || isset($data['name']))
                    <div class="flex items-center justify-center mt-6 md:mt-0">
                        <div>
                            <img class="rounded-full shadow-xl mx-auto w-[200px] h-[200px] object-cover" width="200px"
                                src="{{ url("/media/{$data['image']}") }}" alt="">
                            @isset($data['name'])
                                <div class="font-bold text-lg text-center mt-2">{{ $data['name'] }}</div>
                            @endisset
                        </div>
                    </div>
                @endif
                <div class="prose flex items-center {{ $hasImage ? 'col-span-1' : 'col-span-2' }}">
                    <div>
                        {!! $data['content'] ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
