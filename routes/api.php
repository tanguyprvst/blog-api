<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::middleware(['post'])->group(function () {
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    });
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
