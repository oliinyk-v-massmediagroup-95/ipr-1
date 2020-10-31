<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'min:3', 'max:150'],
            'password' => ['required', 'min:3', 'max:50'],
        ];
    }
}
