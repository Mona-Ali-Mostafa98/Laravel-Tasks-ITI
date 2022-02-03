<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit',[Postcontroller::class,'edit'])->name('posts.edit');      //edit
Route::delete('/posts/{post}',[Postcontroller::class,'destroy'])->name('posts.destroy');  //delete
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
