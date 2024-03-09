<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\RegisterForm;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function register()
    {
        $data = $this->form->validate();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        Auth::login($user);

        event(new Registered($user));

        $this->redirect(route('auth.profile'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
