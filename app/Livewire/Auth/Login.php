<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function login()
    {
        $data = $this->form->validate();

        $user = User::where('email', '=', $data['email'])->first();

        if (!is_null($user)) {
            if (Hash::check($data['password'], $user->password)) {
                Auth::login($user);
                $this->redirect(route('auth.profile'));
            } else {
                $this->form->addError('password', 'Неправильный логин или пароль');
            }
        } else {
            $this->form->addError('password', 'Неправильный логин или пароль');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
