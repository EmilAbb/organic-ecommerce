<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'address' => 'required|string',
            'phone' => 'required|string'
        ];
    }
}
