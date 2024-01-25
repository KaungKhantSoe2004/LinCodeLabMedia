<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\ApiCategoryController;
use App\Http\Controllers\apiTrendPostController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login', [AuthController::class, 'getLoginToken']);
Route::post('getCategory', function(){
    $data = Category::get();

    return response()->json([
        'data'=> $data,
        'status'=> 'success',

    ]);
})->middleware('auth:sanctum');
Route::post("user/register", [AuthController::class, 'getRegisterToken']);
Route::get("user/getAllPostList", [AuthController::class, 'getAllPostList']);
Route::get("user/getAllCategories", [ApiCategoryController::class, 'getAllCategories']);
Route::post("user/searchPosts", [ApiPostController::class, 'searchPosts']);
Route::post('user/searchWithCategory', [ApiPostController::class, 'searchWithCategory']);
Route::post('user/getPostDetails', [ApiPostController::class, 'getPostDetails']);
Route::post('user/createActionLog', [apiTrendPostController::class, 'createActionLog']);
