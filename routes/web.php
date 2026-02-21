<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});


Route::get('contact-us',function(){
    return view('contactus');
});

Route::get('about-us',function(){
    return view('aboutus');
});
