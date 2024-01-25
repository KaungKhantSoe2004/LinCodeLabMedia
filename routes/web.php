<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminListController;
use App\Http\Controllers\TrendPostController;

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



Route::middleware([
   'auth'
])->group(function () {

    // 'auth:sanctum',
    // config('jetstream.auth_session'),
    // 'verified',
    // welcome
    Route::get('/', function () {
        return redirect()->route('admin#profile');
    });

    // direct pages

    // profile
    Route::get('profile',[profileController::class, 'profileData'])->name('admin#profile');
    Route::get('changePassword/{id}',[profileController::class,'changePassword'])->name("admin#changePasswordPage");

    // admin List
Route::get("adminList", [AdminListController::class, 'getAdminList'])->name('admin#adminList');
Route::get('accountDelete/{id}',[AdminListController::class, 'accountDelete'])->name("admin#accountDelete");

// category
Route::get('category', [CategoryController::class, 'directCategory'])->name("admin#category");
Route::get("categoryAddPage", [CategoryController::class, 'addPage'])->name("admin#categoryAddPage");
Route::get('categoryEditPage/{id}', [CategoryController::class, 'editPage'])->name('admin#categoryEditPage');
Route::get("categoryDelete/{id}",[CategoryController::class, 'delete'])->name("admin#categoryDelete");


// Post
Route::get("post", [PostController::class, 'directPost'])->name("admin#post");
Route::get("addPostPage", [PostController::class, 'addPostPage'])->name("admin#directAddPost");
Route::get("postDelete/{id}", [PostController::class, 'postDelete'])->name("admin#postDelete");
Route::get("postEditPage/{id}", [PostController::class, 'postEditPage'])->name("admin#postEditPage");
Route::get('postDetails/{id}', [PostController::class, 'postDetails'])->name("admin#postDetails");


// trend Post
Route::get('trendPost', [TrendPostController::class, 'directTrendPost'])->name("admin#trendPost");

// Route::get("user/getTrendPost", [apiTrendPostController::class, 'getTrendPost'])->name("admin#");




// all Post methods
Route::post('updateProfile', [profileController::class, 'updateProfile'])->name('admin#updateAdminProfile');
Route::post('updatePassword', [profileController::class, 'updatePassword'])->name('admin#updatePassword');
Route::post('addCategory', [CategoryController::class, 'addCategory'])->name("admin#addCategory");
Route::post('updateCategory', [CategoryController::class, 'updateCategory'])->name("admin#updateCategory");
Route::post("addPost", [PostController::class, 'addPost'])->name("admin#addPost");
Route::post('updatePost', [PostController::class, 'updatePost'])->name("admin#updatePost");

});
