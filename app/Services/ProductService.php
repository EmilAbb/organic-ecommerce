<?php

namespace App\Services;

use App\Models\Category;

use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Cache;


class ProductService
{
    public function __construct(protected ProductRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function index()
    {
        return $this->repository->paginate(10,['category.translation']);
    }

    public function store($request)
    {
        $data = $request->all();
        $data['image'] = $this->fileUploadService->uploadFile($request->image,'products');
        $model =  $this->repository->save($data,new Product());
        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
        if ($request->has('image')){
            $data['image'] = $this->fileUploadService->replaceFile($request->image,$model->image,'products');
        }
        $model =   $this->repository->save($data,$model );
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
       Cache::forget('products');
    }

    public function cachedProducts()
    {
       return Cache::rememberForever('products',fn() => $this->repository->all(with: ['translations']));
    }

}
