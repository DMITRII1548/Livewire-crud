<?php

namespace App\Livewire\Forms\Post;

use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Form;

class UpdateForm extends Form
{
    use WithFileUploads;

    #[Validate('required|string', onUpdate: false)]
    public $title = '';

    #[Validate('required|string', onUpdate: false)]
    public $content = '';

    #[Validate('nullable|image', onUpdate: false)]
    public $image = null;
}
