<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/addPost', [PostController::class,'addPost']);
Route::get('/getPosts', [PostController::class,'getPost']);
Route::get('/postDetail/{id}', [PostController::class,'postDetail']);
Route::get('/deletePost/{id}', [PostController::class,'deletePost']);
Route::get('/editPost/{id}', [PostController::class,'editPost']);
Route::post('/createPost', [PostController::class,'createPost'])->name('post.create');
Route::post('/updatePost', [PostController::class,'updatePost'])->name('post.update');
