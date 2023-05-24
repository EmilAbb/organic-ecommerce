<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service)
    {
    }

    public function index()
    {

        $models = $this->service->index();
        return view('admin.product.index',compact('models'));
    }

    public function create(CategoryService $categoryService)
    {
        $categories = $categoryService->cachedCategories();
        return view('admin.product.form',compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('product.index');
    }

    public function edit(Product $product,CategoryService $categoryService)
    {
        $categories = $categoryService->cachedCategories();
        return view('admin.product.form',['model'=>$product,'categories' => $categories]);
    }

    public function update(ProductRequest $request , Product $product)
    {
        $this->service->update($request,$product);
        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        $this->service->delete($product);
        return redirect()->back();
    }
}
