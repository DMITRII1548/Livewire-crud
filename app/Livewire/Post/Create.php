<?php

namespace App\Livewire\Post;

use App\Livewire\Forms\Post\StoreForm;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class Create extends Component
{
    use WithFileUploads;

    public StoreForm $form;

    public function render(): View
    {
        return view('livewire.post.create');
    }

    public function store(): void
    {
        $data = $this->form->validate();
        $data['image'] = $this->form->image->store('images');

        // dd($data);
        Post::create($data);

        $this->redirect(route('posts.index'));
    }
}
