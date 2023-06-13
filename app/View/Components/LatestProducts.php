<?php

namespace App\View\Components;

use App\Services\CategoryService;
use App\Services\ProductService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestProducts extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(protected $title,protected $productType,protected ProductService $productService,protected CategoryService $categoryService)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $latestProducts = $this->productService->getProductLimit($this->productType);
        $title = $this->title;
        return view('components.latest-products',compact('latestProducts','title'));
    }
}
