<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


// Route::get('/', [HomeController::class,'welcome']);
// Route::get('/home', [HomeController::class,'home']);
// Route::get('/about', [HomeController::class,'about']);
// Route::get('/contact', [HomeController::class,'contact']);
// Route::get('/login', [HomeController::class,'login']);
// Route::get('/forgot', [HomeController::class,'forgot']);
Route::get('/{any}', function(){
    return view('vue');
})->where('any', '.*');