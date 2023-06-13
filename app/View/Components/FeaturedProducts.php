<?php

namespace App\View\Components;

use App\Models\Category;
use App\Services\CategoryService;
use App\Services\ProductService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedProducts extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(protected $title,protected $productType,protected ProductService $productService,protected CategoryService $categoryService)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $products = $this->productService->getProductByTypes($this->productType);
        $title = $this->title;
        $categories = Category::limit(5)->get();
        return view('components.featured-products',compact('products','title','categories'));
    }
}
