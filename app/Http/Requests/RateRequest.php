<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
           'product_id' => 'required|exists:products,id',
            'full_name' => 'required|max:30',
            'comment' => 'required|max:255',
            'email' => 'required|email',
            'rating' => 'required|numeric|min:1|max:5'
        ];
    }
}
