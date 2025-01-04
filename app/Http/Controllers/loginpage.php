<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest; 
use Illuminate\Support\Facades\DB;

class LoginPage extends Controller // تغییر نام کلاس
{ 
    public function signup(LoginRequest $r)
    {
                DB::table('users')->insertOrIgnore([
            'name' => $r->username,
            'email' => $r->email,
            'password' => bcrypt($r->password)
        ]);
    
     echo redirect('/ ') ;  
    }

         
    

    public function login(LoginRequest $r)
    {
        // اعتبارسنجی ورودی‌ها با استفاده از LoginRequest
        $validated = $r->validated();

        // گرفتن کاربر با ایمیل مشخص
        $user = User::where('email', $validated['email'])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            return redirect('/'); 
        } else {
            // ورود ناموفق
            return response()->json(['error' => 'Invalid email or password'], 401);
        }
    }
}