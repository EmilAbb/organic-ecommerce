<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TranslationRequest extends FormRequest
{
    public function rules(): array
    {
        $id = $this->route('translation')?->id;
        $validations = [
            'key' => ['required',Rule::unique('translations','key')->ignore($id)],
            'value' => 'required|array'
        ];

        return $this->validateTranslations($validations);
    }

    public function validateTranslations($validations)
    {
        foreach (config('app.languages') as $lang){
            $validations["value.$lang"] = 'required|string|min:2';
        }
        return $validations;
    }
}
