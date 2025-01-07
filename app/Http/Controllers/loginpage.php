<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\login;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class LoginPage extends Controller
{
    public function signup(LoginRequest $r)
    {

        DB::table('user')->insertOrIgnore([
            'name' => $r->username,
            'email' => $r->email,
            'password' => ($r->password)
        ]);

        echo redirect('/');
    }




    public function login(Login $request)
{
    // بررسی وجود کاربر
    if (!$request->userExists()) {
        return response()->json(['error' => 'ایمیلی با این مشخصات وجود ندارد.'], 404);
    }

    // در اینجا می‌توانید ادامه منطق ورود را پیاده‌سازی کنید
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return response()->json(['message' => 'ورود موفق!'], 200);
    }

    return response()->json(['error' => 'رمز عبور نادرست است.'], 401);
}
}
