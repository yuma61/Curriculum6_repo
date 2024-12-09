<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

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


Route::get('/', [PostController::class, 'index']);  

Route::post('/posts', [PostController::class, 'store']);
// /postのPOSTアクセスを受け付けられるように、post()で

Route::get('/posts/create', [PostController::class, 'create']);
// /posts/createは、/posts/{post}よりも上に書く
// web.phpは上からルーティングを見ていき、当てはまるルーティングのものが呼び出される。

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::get('/posts/{post}', [PostController::class, 'show']);
// This {post} have to match the variable name created in show function.
// The variable was created like "Post $post" in the show funciton, so it has to be {post}

Route::put('/posts/{post}', [PostController::class, 'update']);

Route::delete('/posts/{post}', [PostController::class, 'delete']);


