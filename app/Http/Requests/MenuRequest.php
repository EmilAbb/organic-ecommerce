<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MenuRequest extends FormRequest
{


    public function rules(): array
    {
        $data = [
            'url' => 'required|string',
            'parent_id' => 'nullable|exists:menus,id'

        ];
        return $this->mapLangValidations($data);
    }
    private function mapLangValidations($data)
    {
        foreach (config('app.languages') as $lang){
            $data[$lang] = 'required|array';
            $data["$lang.title"] = 'required|string|min:2';

        }
        return $data;
    }
}
