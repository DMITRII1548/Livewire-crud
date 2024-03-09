<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate('required|string|min:2', onUpdate: false)]
    public $name = '';

    #[Validate('required|email|unique:users,email', onUpdate: false)]
    public $email = '';

    #[Validate('required|string|min:8|confirmed', onUpdate: false)]
    public $password = '';

    public $password_confirmation = '';
}
