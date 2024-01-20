@props(['data'])
<div class="text-center">
    <button class="btn {{ isset($data['size']) ? $data['size'] : 'btn-lg' }} btn-primary">
        <span>{{ $data['text'] ?? 'Get Started' }}</span> <x-icons.chevron-left
            class="rotate-180 w-[2em] fill-base-100" />
    </button>
</div>
