<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/blogs', [\App\Http\Controllers\BlogController::class, 'index'])->name('blogs.list');
Route::get('/blog/create', [\App\Http\Controllers\BlogController::class, 'create'])->name('create.blog');
Route::post('/blog', [\App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');

Route::get('/blog/{blog}/edit', [\App\Http\Controllers\BlogController::class, 'edit'])->name('edit.blog');
Route::post('/blogUpd/{blog}', [\App\Http\Controllers\BlogController::class, 'update'])->name('update.blog');

Route::get('/blog/{blog}/delete', [\App\Http\Controllers\BlogController::class, 'destroy'])->name('delete.blog');


Route::get('/posts/{blog}', [\App\Http\Controllers\PostController::class, 'index'])->name('blog_posts.list');
Route::get('/post/{blog}/create', [\App\Http\Controllers\PostController::class, 'create'])->name('create.post');
Route::post('/post/{blog}', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/post/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::get('/post/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('edit.post');
Route::post('/postUpd/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('update.post');

Route::get('/post/{post}/delete', [\App\Http\Controllers\PostController::class, 'destroy'])->name('delete.post');



