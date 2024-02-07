<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;

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

// Login , Register Routes
Auth::routes(["verify"=> true]);

// Post Route
Route::middleware(["auth"])->group( function () {
    Route::resource("/posts", PostController::class);
    Route::get("/posts/{post}/share",[ PostController::class , "share"])->name('posts.share');

});

Route::middleware(['auth'])->group( function () {
    Route::resource('/user', UserController::class);
});


Route::get('/tags', [TagController::class,'index']);
