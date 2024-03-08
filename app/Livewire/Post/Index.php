<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render(): View
    {
        $posts = Post::paginate(2);

        return view('livewire.post.index', compact('posts'));
    }

    public function destroy(Post $post): void
    {
        Storage::disk('public')->delete($post->image);
        $post->delete();
    }
}
