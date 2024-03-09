<?php

namespace App\Livewire\Post;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Illuminate\Support\Collection;
use Livewire\Component;

class Scroll extends Component
{
    public $posts;
    public int $on_page = 25;
    public $categories;
    public ?int $currectCategoryId = null;

    public function mount()
    {
        $this->posts = Post::inRandomOrder()->take($this->on_page)->get();
        $this->categories = Category::all();
    }

    #[Computed]
    public function isMorePosts(): bool
    {
        return $this->posts->count() >= $this->on_page;
    }

    public function loadMore(): void
    {
        $loadedPostIds = $this->posts->pluck('id')->toArray();

        $addedPosts = $this->currectCategoryId ?
            $this->loadPostsByCategory(
                $this->currectCategoryId,
                $loadedPostIds
            )
            : Post::whereNotIn('id', $loadedPostIds)
            ->inRandomOrder()
            ->take(25)
            ->get();

        $this->posts = $this->posts->concat($addedPosts);

        $this->on_page += 25;
    }

    public function render()
    {
        return view('livewire.post.scroll');
    }

    public function changeCurrectCategory(int $id)
    {
        $this->on_page = 25;
        $this->currectCategoryId = $id;

        $this->posts = Post::take(25)
            ->where('category_id', '=', $id)
            ->get();
    }

    private function loadPostsByCategory(int $id, array $loadedPostIds)
    {
        return Post::whereNotIn('id', $loadedPostIds)
            ->where('category_id', '=', $id)
            ->inRandomOrder()
            ->take(25)
            ->get();
    }
}
