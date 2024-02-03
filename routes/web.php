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
Auth::routes();
Route::get("posts/{post}", [PostController::class,"show"])->name("post.show");
Route::resource("/posts", PostController::class);
// Post Route
Route::group( [],function () {
    
    
    Route::get("/posts/{post}/share",[ PostController::class , "share"])->name('posts.share');

});

