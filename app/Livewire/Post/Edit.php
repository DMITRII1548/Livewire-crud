<?php

namespace App\Livewire\Post;

use App\Livewire\Forms\Post\UpdateForm;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    
    public Post $post;
    public UpdateForm $form;

    public function mount(): void
    {
        $this->form->title = $this->post->title;
        $this->form->content = $this->post->content;
    }

    public function render(): View
    {
        return view('livewire.post.edit', [
            'post' => $this->post
        ]);
    }

    public function update(): void
    {
        $data = $this->form->validate();
        if ($data['image']) {
            Storage::disk('public')->delete($this->post->image);
            $data['image'] = $this->form->image->store('images');
        } else {
            unset($data['image']);
        }

        $this->post->update($data);

        $this->redirect(route('posts.index'));
    }
}
