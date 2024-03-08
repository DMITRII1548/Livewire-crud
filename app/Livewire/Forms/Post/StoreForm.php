<?php

namespace App\Livewire\Forms\Post;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class StoreForm extends Form
{
    use WithFileUploads;

    #[Validate('required|string', onUpdate: false)]
    public $title = '';

    #[Validate('required|string', onUpdate: false)]
    public $content = '';

    #[Validate('required|image', onUpdate: false)]
    public $image;
}
