<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthorController, PostController};

// Authors
Route::get('/authors/create', [AuthorController::class, 'create'])->name('create-author-form');
Route::post('/authors', [AuthorController::class, 'store'])->name('create-author');
Route::get('/authors/{author}/edit', [AuthorController::class, 'edit'])->name('edit-author-form');
Route::put('/authors/{author}', [AuthorController::class, 'update'])->name('edit-author');
Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])->name('delete-author');
Route::get('/authors', [AuthorController::class, 'index'])->name('all-authors');

// Posts
Route::post('/posts', [PostController::class, 'store'])->name('create-post');
Route::get('/posts', [PostController::class, 'index'])->name('all-posts');