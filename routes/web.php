<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/admin', function () {
    return view('admin.index');
})->name('home');




Route::prefix('/admin')->group(function(){

    Route::get('/articles', [ArticleController::class, 'index'])->name('admin.articles.list');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.list');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
});