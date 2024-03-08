<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Show extends Component
{
    public Post $post;

    public function render(): View
    {
        return view('livewire.post.show',[
            'post' => $this->post
        ]);
    }
}
