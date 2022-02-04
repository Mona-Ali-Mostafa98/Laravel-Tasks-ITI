<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')-> middleware('auth');
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create') -> middleware(['auth', 'isAdminMiddleware']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')-> middleware('auth');
Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update')-> middleware('auth');
Route::delete('/posts/{post}',[Postcontroller::class,'destroy'])->name('posts.destroy')-> middleware('auth');  //delete
Route::get('/posts/{post}/edit',[Postcontroller::class,'edit'])->name('posts.edit')-> middleware('auth');      //edit
Route::post('/posts',[PostController::class, 'store'])->name('posts.store')-> middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// login to github
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    // dd($user);
    // $user->token
});

// // login use google
// Route::get('/auth/redirect', function () {
//     return Socialite::driver('google')->redirect();
// })->name('auth.google');

// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('google')->user();
// });