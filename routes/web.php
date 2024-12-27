<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('loginpage');
});








Route::fallback(function(){
return view('404page')  ; 
});