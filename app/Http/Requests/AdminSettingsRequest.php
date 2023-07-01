<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminSettingsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => [Rule::requiredIf(request()->method == self::METHOD_POST),'image','mimes:jpg,jpeg,png'],
            'phone' => 'required|string|max:255',
            'description' => 'required|string|min:2,max:255',
            'email' => 'required|string|email|max:255',
            'text' => 'required|min:2,max:255',
            'address' => 'required|string|min:2,max:255',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'linkedin' => 'required|url',
            'pinterest' => 'required|url',

        ];
    }
}
