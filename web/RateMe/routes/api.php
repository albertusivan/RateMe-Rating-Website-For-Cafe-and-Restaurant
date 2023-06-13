<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\CommentController;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/cafe', [CafeController::class, 'index']);
Route::get('/cafe/search', [CafeController::class, 'search']);
Route::get('/cafe/comment', [CommentController::class, 'index']);
Route::post('/cafe/comment-add', [CommentController::class, 'create']);
Route::get('/cafe/bookmark', [BookmarkController::class, 'index']);
Route::post('/cafe/bookmark-add', [BookmarkController::class, 'create']);

// protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    // user
    Route::post('/logout', [AuthController::class, 'logout']);
});
