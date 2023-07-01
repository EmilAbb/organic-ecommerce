<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Services\AdminSettingsService;
use App\Services\CategoryService;
use App\Services\MenuService;
use App\Services\OrganicService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function filter(Request $request)
    {
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $products = Product::whereBetween('price',[$minPrice , $maxPrice])->get();
        return view('components.products',compact('products'))->render();
    }

    public function search(Request $request, AdminSettingsService  $adminSettingsService,MenuService $menuService,OrganicService $organicService)
    {
        $menus = $menuService->cachedMenu();
        $adminSettings = $adminSettingsService->cachedAdminSettings();
       $query = $request->input('query');
        $products = Product::whereHas('translations', function ($queryBuilder) use ($query) {
            $queryBuilder->where('title', 'like', '%' . $query . '%');
        })->get();
       return view('front.search-result',compact('query','products','adminSettings','menus'));
    }
}
