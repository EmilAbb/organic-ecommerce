<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $service)
    {
    }

    public function index()
    {

        $models = $this->service->index();
        return view('admin.category.index',compact('models'));
    }

    public function create()
    {
        $categories = $this->service->cachedCategories();
        return view('admin.category.form',compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        $categories = $this->service->cachedCategories();
        return view('admin.category.form',['model'=>$category,'categories' => $categories]);
    }

    public function update(CategoryRequest $request , Category $category)
    {
        $this->service->update($request,$category);
        return redirect()->back();
    }

    public function destroy(Category $category)
    {
        $this->service->delete($category);
        return redirect()->back();
    }
}
