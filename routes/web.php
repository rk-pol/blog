<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Services\CommentService;

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
Route::middleware(['ip_user_exists'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/posts', [PostController::class, 'posts']);
    Route::get('/post/{id}', [PostController::class, 'post']);
    Route::post('/post/comment/increase', [CommentService::class, 'checkUsersInteraction']);
    Route::post('/post/comment/decrease', [CommentService::class, 'checkUsersInteraction']);
    Route::get('/about', [AboutController::class, 'index']);
    Route::post('/create_comment', [CommentController::class, 'create']);
    Route::get('/search', [PostController::class, 'getPostBySearching']);
});

Route::post('/subscribe', [NewsletterController::class, 'subscribe']);


Auth::routes();

