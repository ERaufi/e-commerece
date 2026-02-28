<?php

use App\Http\Controllers\FirstController;
use App\Http\Controllers\MySecondController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});


// Route::get('contact-us',function(){
//     return view('contactus');
// });

// Route::get('about-us',function(){
//     return view('aboutus');
// });


Route::controller(FirstController::class)->group(function(){
Route::get('index','index');
Route::get('about-us/{id}/{name}','aboutus');
Route::get('abc','abc');
});

Route::get('showController',MySecondController::class);
