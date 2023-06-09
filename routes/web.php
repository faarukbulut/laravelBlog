<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;



Route::get('/admin/login', [LoginController::class, "showLogin"])->name("login");
Route::post('/admin/login', [LoginController::class, "login"]);

Route::prefix('/admin')->middleware('auth')->group(function(){

    Route::get('/', function(){
        return view('admin.index');
    })->name('admin.index');

    Route::post('/logout', [LoginController::class, "logout"])->name('logout');

    Route::get('/articles', [ArticleController::class, 'index'])->name('admin.articles.list');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/articles/create', [ArticleController::class, 'store']);



    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.list');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/create', [CategoryController::class, 'store']);
    Route::post('/categories/change-status', [CategoryController::class, 'changeStatus'])->name('admin.categories.changeStatus');
    Route::post('/categories/change-featurestatus', [CategoryController::class, 'changeFeatureStatus'])->name('admin.categories.changeFeatureStatus');
    Route::post('/categories/delete', [CategoryController::class, 'delete'])->name('admin.categories.delete');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit')->whereNumber('id');
    Route::post('/categories/{id}/edit', [CategoryController::class, 'update'])->whereNumber('id');
});