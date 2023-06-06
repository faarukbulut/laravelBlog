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
    Route::post('/categories/change-status', [CategoryController::class, 'changeStatus'])->name('admin.categories.changeStatus');
    Route::post('/categories/change-featurestatus', [CategoryController::class, 'changeFeatureStatus'])->name('admin.categories.changeFeatureStatus');
    Route::post('/categories/delete', [CategoryController::class, 'delete'])->name('admin.categories.delete');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');

});