<?php

namespace App\View\Components;

use App\Services\CategoryService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryList extends Component
{

    public function __construct(protected CategoryService $categoryService)
    {
        //
    }


    public function render(): View|Closure|string
    {
        $categories = $this->categoryService->cachedCategories();
        return view('components.category-list',compact('categories'));
    }
}
