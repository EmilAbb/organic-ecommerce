<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{

    public function rules(): array
    {
        $data = [
                'image' => [Rule::requiredIf(request()->method == self::METHOD_POST),'image','mimes:jpg,jpeg,png'],
            'active' => 'nullable|boolean',
            'parent_id' => 'nullable|exists:categories,id',
            'attributes' => 'nullable|array',
            'attributes.*' => 'exists:attributes,id'

        ];
        return $this->mapLangValidations($data);
    }
    private function mapLangValidations($data)
    {
        $id = $this->route('category')?->id;
        foreach (config('app.languages') as $lang){
            $data[$lang] = 'required|array';
            $data["$lang.title"] = 'required|string|min:2';
            $data["$lang.slug"] = ['required','string','min:2',Rule::unique('category_translations','slug')->where('locale',$lang)->ignore($id,'category_id')];
        }
        return $data;
    }
}
