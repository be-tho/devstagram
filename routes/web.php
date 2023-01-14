<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
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
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/crear-cuenta', [AuthController::class, 'index'])->name('auth.index');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout.store')->middleware('auth');

//posts
Route::get('/muro/{user:username}', [PostController::class, 'index'])->name('dashboard.index');
//crear post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//comentarios
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');
//borrar comentario

//imagenes
Route::post('/images', [ImagenController::class, 'store'])->name('images.store')->middleware('auth');

//like a las fotos
Route::post('/posts/{post}/like', [LikeController::class, 'store'])->name('posts.like.store')->middleware('auth');
Route::delete('/posts/{post}/like', [LikeController::class, 'destroy'])->name('posts.like.destroy')->middleware('auth');


