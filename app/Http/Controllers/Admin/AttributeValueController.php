<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeValueRequest;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Services\AttributeValueService;

class AttributeValueController extends Controller
{
    public function __construct(protected AttributeValueService $service)
    {
    }

    public function index($attributeId)
    {

        $models = $this->service->index($attributeId);
        return view('admin.attribute-value.index',compact('models','attributeId'));
    }

    public function create($attributeId)
    {

        return view('admin.attribute-value.form',compact('attributeId'));
    }

    public function store(AttributeValueRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('attribute-value.index',$request->attribute_id);
    }

    public function edit(AttributeValue $attributeValue)
    {

        return view('admin.attribute-value.form',['model'=>$attributeValue]);
    }

    public function update(AttributeValueRequest $request , AttributeValue $attributeValue)
    {
        $this->service->update($request,$attributeValue);
        return redirect()->back();
    }

    public function destroy( AttributeValue $attributeValue)
    {
        $this->service->delete($attributeValue);
        return redirect()->back();
    }

}
