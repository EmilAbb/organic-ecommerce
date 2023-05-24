<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\CategoryService;
use App\Services\ProductImageService;
use App\Services\ProductService;

class ProductImageController extends Controller
{
    public function __construct(protected ProductImageService $service)
    {
    }

    public function index($productId)
    {

        $models = $this->service->index($productId);
        return view('admin.product-image.index',compact('models','productId'));
    }

    public function create($productId)
    {
        return view('admin.product-image.form',compact('productId'));
    }

    public function store(ProductImageRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('product-image.index',$request->product_id);
    }

    public function edit(ProductImage $productImage)
    {
        return view('admin.product-image.form',['model'=>$productImage,'productId' => $productImage->product_id]);
    }

    public function update(ProductImageRequest $request , ProductImage $productImage)
    {
        $this->service->update($request,$productImage);
        return redirect()->back();
    }

    public function destroy(ProductImage $productImage)
    {
        $this->service->delete($productImage);
        return redirect()->back();
    }
}
