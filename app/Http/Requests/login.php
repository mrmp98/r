<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class Login extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email', // ایمیل باید وارد شود و باید یک ایمیل معتبر باشد
            'password' => 'required', // رمز عبور باید وارد شود
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'لطفاً ایمیل را وارد کنید.',
            'email.email' => 'لطفاً یک ایمیل معتبر وارد کنید.',
            'password.required' => 'لطفاً رمز عبور را وارد کنید.',
        ];
    }

    /**
     * Check if the user exists in the database.
     */
    public function userExists(): bool
    {
        $user = User::where('email', $this->input('email'))->first();
        return $user !== null;
    }
}