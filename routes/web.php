<?php

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

Route::get('/posts/create', \App\Livewire\Post\Create::class)->name('posts.create');
Route::get('/posts', \App\Livewire\Post\Index::class)->name('posts.index');
Route::get('/posts/{post}', \App\Livewire\Post\Show::class)->name('posts.show');
Route::get('/posts/{post}/edit', \App\Livewire\Post\Edit::class)->name('posts.edit');
