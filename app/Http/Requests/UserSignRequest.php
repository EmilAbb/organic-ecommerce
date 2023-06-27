<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSignRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'email' => 'required|email|string|max:30|unique:users',
            'password' => 'required|string|min:6'
        ];
    }
}
