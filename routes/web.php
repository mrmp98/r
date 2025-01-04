<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginpage   ; 
Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('loginpage');
});
Route::POST('/login' , [loginpage::class , 'login']);
Route::POST('/signup' , [loginpage::class , 'signup']);








Route::fallback(function(){
return view('404page')  ; 
});