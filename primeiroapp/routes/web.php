<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Http\Middleware\Authenticate;

// Rotas da view home
Route::get('/', function () {
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->userPosts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});

// Rotas da view posts
Route::get('/posts', function () {
    $posts = Post::with('user')->latest()->get();
    return view('posts', ['posts' => $posts]);
})->middleware(Authenticate::class); // Verifica se o usuário está autenticado

Route::get('/post-category', function () {
    return view('post-category');
});

// Rotas de usuários
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Rotas de posts
Route::post('/create-post', [PostController::class, 'createPost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
Route::get('/edit-post/{post}', [PostController::class, 'editPost']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);