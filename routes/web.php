<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::view('create', 'brands.add');
    Route::post('add', [BrandController::class, 'create']);
    Route::delete('delete/{id}', [BrandController::class, 'destroy']);
    Route::get('edit/{id}', [BrandController::class, 'edit']);
    Route::post('update/{id}', [BrandController::class, 'update']);
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::view('create', 'category.add');
    Route::post('add', [CategoryController::class, 'create']);
    Route::delete('delete/{id}', [CategoryController::class, 'destroy']);
    Route::get('edit/{id}', [CategoryController::class, 'edit']);
    Route::post('update/{id}', [CategoryController::class, 'update']);
});
