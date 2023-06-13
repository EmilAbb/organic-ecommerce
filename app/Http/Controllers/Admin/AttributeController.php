<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Attribute;
use App\Models\AttributeValueProduct;
use App\Models\Category;
use App\Services\AttributeService;

class AttributeController extends Controller
{
    public function __construct(protected AttributeService $service)
    {
    }

    public function index()
    {

        $models = $this->service->index();
        return view('admin.attribute.index',compact('models'));
    }

    public function create()
    {

        return view('admin.attribute.form');
    }

    public function store(AttributeRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('attribute.index');
    }

    public function edit(Attribute $attribute)
    {

        return view('admin.attribute.form',['model'=>$attribute]);
    }

    public function update(AttributeRequest $request , Attribute $attribute)
    {
        $this->service->update($request,$attribute);
        return redirect()->back();
    }

    public function destroy(Attribute $attribute)
    {
        $this->service->delete($attribute);
        return redirect()->back();
    }

    public function getAttributesByCategory(Category $category,$productId = null)
    {
        $selectedAttributeValues = [];
        if ($productId){
            $selectedAttributeValues =  AttributeValueProduct::where('product_id',$productId)->pluck('attribute_value_id')->toArray();
        }
        $attributes = $category->load('attributes.values')->attributes;
        return view('admin.attribute.product-attributes',compact('attributes','selectedAttributeValues'))->render();
    }
}
