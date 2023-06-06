<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('admin.index');
})->name('home');


















Route::prefix('/admin')->group(function(){
    Route::get('/category-list', [CategoryController::class, 'list'])->name("admin.category.list");
    Route::get('/category-create', [CategoryController::class, 'create'])->name("admin.category.create");
    Route::post('/category-create', [CategoryController::class, 'store']);
});