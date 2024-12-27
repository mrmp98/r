<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginpage   ; 
Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('loginpage');
});
Route::POST('login' , [loginpage::class , 'index']);








Route::fallback(function(){
return view('404page')  ; 
});