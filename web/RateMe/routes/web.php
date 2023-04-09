<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('cafe');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cafe', [App\Http\Controllers\CafeController::class, 'index'])->name('cafe');

Route::resource('cafe', CafeController::class);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/bookmark', 'App\Http\Controllers\BookmarkController@index');
    Route::resource('cafe.bookmark', BookmarkController::class)->shallow();
    Route::resource('cafe.rating', RatingController::class)->shallow();
    Route::resource('cafe.menu', MenuController::class)->shallow();
    Route::resource('cafe.comments', CommentController::class)->shallow();
});

Route::post('cafe/{cafe:id}/menu_store')->name('cafe_menu_store');
Route::delete('cafe/{cafe:id}/menu/{menu:id}')->name('cafe_menu_destroy');
