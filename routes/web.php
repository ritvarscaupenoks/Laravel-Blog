<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;

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

Route::view('/', 'home');
Route::view('/register', 'register');
Route::view('/feed', 'feed');

Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'destroy']);
Route::get('/feed', [PostController::class, 'index']);
Route::get('/create-post', [PostController::class, 'showCreatePostForm']);
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/my-posts', [PostController::class, 'showMyPosts'])->middleware('auth');
Route::post('/delete-post/{post}', [PostController::class, 'deletePost'])->middleware('auth');
Route::get('/edit-post/{post}', [PostController::class, 'editPost'])->middleware('auth');
Route::put('/edit-post/{post}', [PostController::class, 'updatePost'])->middleware('auth');


