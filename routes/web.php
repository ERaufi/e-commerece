<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\MySecondController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});

Route::controller(CategoryController::class)->group(function(){
Route::get('category','index');
Route::get('add-category','add');
Route::get('show-category/{id}','show');
Route::get('update-category/{id}','update');
Route::get('delete-category/{id}','delete');


});
