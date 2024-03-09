<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Illuminate\Support\Collection;
use Livewire\Component;

class Scroll extends Component
{
    public $posts;
    public int $on_page = 25;

    public function mount()
    {
        $this->posts = Post::inRandomOrder()->take($this->on_page)->get();
    }

    #[Computed]
    public function isMorePosts(): bool
    {
        return $this->posts->count() >= $this->on_page;
    }

    public function loadMore(): void
    {
        $loadedPostIds = $this->posts->pluck('id')->toArray();

        $this->posts = $this->posts->concat(
            Post::whereNotIn('id', $loadedPostIds)
                ->inRandomOrder()
                ->take(25)
                ->get()
        );

        $this->on_page += 25;
    }

    public function render()
    {
        return view('livewire.post.scroll', [
            'posts' => $this->posts,
        ]);
    }
}
