<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrendPostController;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.profile.index');
    // })->name('dashboard');

    // dashboard profile
    Route::get('/dashboard',[ProfileController::class,'index'])->name('dashboard');
    Route::post('/account/update',[ProfileController::class,'updateAdminAcc'])->name('admin#updateAcc');
    Route::get('admin/password',[ProfileController::class,'chgPasswordPage'])->name('admin#password');
    Route::post('admin/password/update',[ProfileController::class,'changePassword'])->name('admin#changePassword');

    // admin list
    Route::get('/admin/list',[ListController::class,'index'])->name('admin#list');
    Route::get('admin/account/delete', [ListController::class,'deleteAcc']);

    // category
    Route::get('admin/category',[CategoryController::class,'index'])->name('admin#category');
    Route::post('admin/category/create',[CategoryController::class,'createCategory'])->name('admin#createCategory');
    Route::get('admin/category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('admin#deleteCategory');
    Route::get('admin/category/edit/{id}',[CategoryController::class,'editCategoryPage'])->name('admin#editCategoryPage');
    Route::post('admin/category/update/{id}',[CategoryController::class,'updateCategory'])->name('admin#updateCategory');

    // post
    Route::get('admin/post',[PostController::class,'index'])->name('admin#post');
    Route::post('admin/post/create',[PostController::class,'createPost'])->name('admin#createPost');
    Route::get('admin/post/delete/{id}',[PostController::class,'deletePost'])->name('admin#deletePost');
    Route::get('admin/post/update/{id}',[PostController::class,'updatePostPage'])->name('admin#updatePostPage');
    Route::post('admin/post/update/{id}',[PostController::class,'updatePost'])->name('admin#updatePost');

    // trend post
    Route::get('admin/trendPost',[TrendPostController::class,'index'])->name('admin#trendPost');
    Route::get('admin/trendPost/{id}',[TrendPostController::class,'trendPostDetail'])->name('admin#trendPostDetail');
});
