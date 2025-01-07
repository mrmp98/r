<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Loginrequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:10',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'لطفاً نام کاربری را وارد کنید.',
            'email.required' => 'لطفاً ایمیل را وارد کنید.',
            'email.email' => 'لطفاً یک ایمیل معتبر وارد کنید.',
            'password.required' => 'لطفاً رمز عبور را وارد کنید.',
            
        ];
    }
}