<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{

    public function rules(): array
    {
        $data = [
            'image' => [Rule::requiredIf(request()->method == self::METHOD_POST),'image','mimes:jpg,jpeg,png'],
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:1',
            'qty' => 'nullable|numeric|min:0',

        ];
        return $this->mapLangValidations($data);
    }
    private function mapLangValidations($data)
    {
        $id = $this->route('product')?->id;
        foreach (config('app.languages') as $lang){
            $data[$lang] = 'required|array';
            $data["$lang.title"] = 'nullable|string|min:2';
            $data["$lang.description"] = 'required|string|min:2';
            $data["$lang.specs"] = 'nullable|string|min:2';
            $data["$lang.slug"] = ['required','string','min:2',Rule::unique('product_translations','slug')->where('locale',$lang)->ignore($id,'product_id')];
        }
        return $data;
    }
}
