<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User ; 
use App\Http\Requests\LoginRequest; 
use Illuminate\Support\Facades\DB;

class LoginPage extends Controller // تغییر نام کلاس
{ 
    public function signup(LoginRequest $r)
    { 

                DB::table('user')->insertOrIgnore([
            'name' => $r->username,
            'email' => $r->email,
            'password' => bcrypt($r->password)
        ]);
    
     echo redirect('/ ') ;  
    }

         
    

    public function login()
    {
        $user = User::where('email' , '=' , $_POST['email'])->get() ; 
        print_r($user) ;  
    }
}