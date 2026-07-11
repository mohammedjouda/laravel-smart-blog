<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'publicShow'])
    ->name('posts.show');

Route::group([
    'as' => 'dashboard.',
    'prefix' => 'dashboard/',
    'middleware' => ['auth:web', 'verified'],
], function () {
    Route::resource('posts', PostController::class);
});

Route::get('/main-dashboard', function () {
    return view('Dashboard.main-dashboard');
})->name('dashboard');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
Route::get('/profile/{user:username?}', [ProfileController::class, 'show'])->name('profile');

Route::post('/follow/{user:username}', [FollowController::class, 'follow'])
    ->name('follow')
    ->middleware('auth');

Route::post('/unfollow/{user:username}', [FollowController::class, 'unfollow'])
    ->name('unfollow')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::post('/posts/{post:slug}/like', [LikeController::class, 'toggle'])->name('posts.like');
    Route::post('/posts/{post:slug}/bookmark', [BookmarkController::class, 'toggle'])->name('posts.bookmark');
    Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->name('posts.comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

