<?php

use App\Http\Controllers\Api\ActionLogController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/login',[AuthController::class,'login']);
Route::post('user/register',[AuthController::class,'register']);

Route::get('category',function(){
    return response()->json([
        'message' => 'This is category list'
    ]);
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    // get all post
    Route::get('allPostList', [PostController::class, 'getAllPost']);

    // get all category
    Route::get('allCategory', [CategoryController::class, 'getAllCategory']);

});
// search post
Route::post('post/search', [PostController::class, 'searchPost']);


// view post detail
Route::post('post/detail/{id}', [PostController::class, 'postDetail']);

// action log api
Route::post('post/cationLog', [ActionLogController::class, 'setActionLog']);

// search with category
Route::post('category/search', [CategoryController::class, 'searchCategory']);

