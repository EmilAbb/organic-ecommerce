<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;


class SiteController extends Controller
{
    public function home()
    {
        return view('front.home');
    }

    public function getCategoryBySlug($slug)
    {
        if ($slug!='all') {
            $categoryId = Category::whereTranslation('slug', $slug, app()->getLocale())->first()->id;
            $products = Product::where('category_id', $categoryId)->get();
        }else{
            $products = Product::limit(8)->get();
        }


        return view('front.product-slug',compact('products'))->render();

    }

    public function shop(CategoryService $categoryService,Product $product)
    {
        $products = Product::paginate(9);
        $categories = $categoryService->cachedCategories();
        return view('front.shop',compact('categories','products'));
    }

    public function productDetail($slug)
    {
        $product = Product::with(['reviews','images','category.translations','translations'])
            ->whereTranslation('slug',$slug,app()
                ->getLocale())->first();
        $products = Product::where('category_id',$product->category->id)->get();
        $avg_rating = round($product->reviews->pluck('rating')->avg(),2);
        return view('front.product',compact('product','products','avg_rating'));
    }


}
