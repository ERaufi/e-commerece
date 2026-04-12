<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\MySecondController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});

Route::get('category',[CategoryController::class,'store']);
Route::get('get-data',[CategoryController::class,'getMyData']);
Route::get('where',[CategoryController::class,'whereCond']);
Route::get('update-record',[CategoryController::class,'update']);
Route::get('delete-record',[CategoryController::class,'detelesssssw']);

Route::get('add-brand',[BrandController::class,'addData']);
Route::get('get-brands',[BrandController::class,'getData']);
Route::get('update-brand',[BrandController::class,'updateData']);
Route::get('delete-brand',[BrandController::class,'deleteData']);

Route::get('products',[ProductController::class,'index']);
Route::get('get-draft-product',[ProductController::class,'whereCond']);
