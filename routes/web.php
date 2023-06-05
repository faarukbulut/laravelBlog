<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/admin')->group(function(){
    Route::get('/category-list', [CategoryController::class, 'list']);

});