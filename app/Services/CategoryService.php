<?php

namespace App\Services;

use App\Models\AttributeCategory;
use App\Models\Category;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Cache;


class CategoryService
{
    public function __construct(protected CategoryRepository $repository, protected FileUploadService $fileUploadService)
    {

    }

    public function index()
    {
        return $this->repository->paginate(8, ['parent.translation']);
    }

    public function store($request)
    {

        $data = $request->all();
        $data['image'] = $this->fileUploadService->uploadFile($request->image, 'categories');
        $data['active'] = $data['active'] ?? false;
        $attributes = $data['attributes'] ?? [];
        unset($data['attributes']);
        $model = $this->repository->save($data, new Category());
        $model->attributes()->attach($attributes);
        self::clearCache();
        return $model;
    }

    public function update($request, $model)
    {
        $data = $request->all();
        $model->attributes()->sync($data['attributes'] ?? []);
        if ($request->has('image')) {
            $data['image'] = $this->fileUploadService->replaceFile($request->image, $model->image, 'categories');
        }
        $data['active'] = $data['active'] ?? false;
        unset($data['attributes']);
        $model = $this->repository->save($data, $model);
        self::clearCache();
        return $model;
    }


    public function delete($model)
    {
        self::clearCache();
        $this->fileUploadService->removeFile($model->image);
        return $this->repository->delete($model);
    }

    public static function clearCache()
    {
        Cache::forget('categories');
    }

    public function cachedCategories()
    {
        return Cache::rememberForever('categories', fn() => $this->repository->all(with: ['translations']));
    }

}
