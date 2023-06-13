<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;


class HomeController extends Controller
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
}
