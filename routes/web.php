<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});

Route::prefix('brands')->group(function(){
Route::get('/',[BrandController::class,'index']);
Route::view('create','brands.add');
Route::post('add',[BrandController::class,'create']);
Route::delete('delete/{id}',[BrandController::class,'destroy']);
Route::get('edit/{id}',[BrandController::class,'edit']);
Route::post('update/{id}',[BrandController::class,'update']);
});
