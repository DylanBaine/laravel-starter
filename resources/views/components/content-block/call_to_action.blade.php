@props(['data'])
<div class="text-center">
    <button class="btn btn-lg btn-primary">
        <span>{{ $data['text'] ?? 'Get Started' }}</span> <x-icons.chevron-left class="rotate-180 w-[2em]" />
    </button>
</div>
