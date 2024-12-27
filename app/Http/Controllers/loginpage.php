<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\Loginrequest ; 

class loginpage extends Controller
{
public function index(Loginrequest $r){
    echo 'ok' ; 
}
}
