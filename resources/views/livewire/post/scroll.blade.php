<div class="mt-10 space-y-16 border-t border-gray-200 pt-10">
    {{ $on_page }}
    @forelse($posts as $post)
        <article class="flex max-w-xl flex-col items-start justify-between">
            <div class="group relative">
                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                    <a href="#">
                        <span class="absolute inset-0"></span>
                        {{ $post->id }}
                    </a>
                </h3>
                <p class="mt-2 line-clamp-3 text-sm leading-6 text-gray-600">
                    {{ $post->content }}
                </p>
            </div>
        </article>
    @empty
        <article class="flex max-w-xl flex-col items-start justify-between">
            <div class="group relative">
                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                    No Posts Found
                </h3>
            </div>
        </article>
    @endforelse

    @if($this->isMorePosts)
        <div x-intersect.full="$wire.loadMore()" class="p-4">
            {{-- <div wire:loading wire:target="loadMore()" class="bg-white dark:bg-gray-900 rounded w-full flex items-center justify-center"> --}}
                <div class="text-gray-600">
                    Loading more conversations...
                </div>
            {{-- </div> --}}
        </div>
    @endif
</div>
