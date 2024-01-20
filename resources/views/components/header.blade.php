<header class="px-2 py-4 bg-base-200 sticky top-0 z-50">
    <nav class="max-w-6xl mx-auto flex justify-between items-center h-full">
        <div class="flex items-center h-full">
            <a href="/" class="brightness-150 font-bold">Header</a>
        </div>
        <div class="text-right flex gap-4 items-center h-full">
            <a href="/blog" class="font-bold text-lg">Blog</a>
            <x-content-block.call_to_action :data="['size' => 'btn-sm', 'text' => 'Call Now']" />
        </div>
    </nav>
</header>
