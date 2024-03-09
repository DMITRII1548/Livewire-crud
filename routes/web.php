<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/posts/scroll', \App\Livewire\Post\Scroll::class)->name('posts.scroll');

Route::get('/posts/create', \App\Livewire\Post\Create::class)->name('posts.create');
Route::get('/posts', \App\Livewire\Post\Index::class)->name('posts.index');
Route::get('/posts/{post}', \App\Livewire\Post\Show::class)->name('posts.show');
Route::get('/posts/{post}/edit', \App\Livewire\Post\Edit::class)->name('posts.edit');

Route::get('/auth/login', \App\Livewire\Auth\Login::class)
    ->name('auth.login')
    ->middleware('guest');


Route::get('/auth/register', \App\Livewire\Auth\Register::class)
    ->name('auth.register')
    ->middleware('guest');

Route::get('/auth/profile', \App\Livewire\Auth\Profile::class)
    ->name('auth.profile')
    ->middleware(['auth', 'verified']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('auth.profile');
})->middleware(['auth', 'signed'])->name('verification.verify');