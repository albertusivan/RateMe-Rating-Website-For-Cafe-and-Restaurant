<?php

use App\Http\Controllers\CastController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('movies');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('movies', MovieController::class);
Route::resource('casts', CastController::class);
Route::resource('movies.comments', CommentController::class);

Route::post('movies/{movie:id}/cast_store')->name('movie_cast_store');
Route::delete('movies/{movie:id}/cast/{cast:id}')->name('movie_cast_destroy');

