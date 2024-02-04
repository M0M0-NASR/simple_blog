<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

