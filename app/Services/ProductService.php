<?php

namespace App\Services;

use App\Models\Category;

use App\Models\Product;
use App\Models\ProductType;
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
        return $this->repository->paginate(8,['category.translation']);
    }

    public function store($request)
    {
        $data = $request->all();
        $attributes = collect($data['attributes'] ?? [])->flatten()->toArray();
        $types = $data['types'] ?? [];
        $data['image'] = $this->fileUploadService->uploadFile($request->image,'products');
        unset($data['attributes']);
        unset($data['types']);
        $data['qty'] = $data['qty'] ?? 0;
        $model =  $this->repository->save($data,new Product());
        $model->attributeValues()->sync($attributes);
        $model->types()->insert(collect($types)->map(fn($type) => ['product_id' => $model->id, 'type' => $type])->toArray());


        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
        $attributes = collect($data['attributes'] ?? [])->flatten()->toArray();
//        $types = $data['types'] ?? [];

        if ($request->has('image')){
            $data['image'] = $this->fileUploadService->replaceFile($request->image,$model->image,'products');
        }
        $types=collect($data['types'] ?? [])->flatten()->toArray();

//        dd($types);
        unset($data['attributes']);
        unset($data['types']);
        $data['qty'] = $data['qty'] ?? 0;
        $model =   $this->repository->save($data,$model );
        $model->attributeValues()->sync($attributes);
        if ($request->has('types')){
            $typesOld = collect($model['types'] ?? [])->pluck('type')->flatten()->toArray();
//            dd($types);
            ProductType::where('product_id',$model->id)->delete();
            $model->types()->insert(collect($types)->map(fn($type) => ['product_id' => $model->id, 'type' => $type])->toArray());
        }
        self::clearCache();
        return $model;
    }


    public function delete($model)
    {
        foreach ($model->images as $productImage){
            $this->fileUploadService->removeFile($productImage->image);
        }
        self::clearCache();
        $this->fileUploadService->removeFile($model->image);
       return  $this->repository->delete($model);

    }

    public function getProductByTypes($productType)
    {
        return $this->repository->query()->with(['category.translations','translations'])->whereHas('types',function ($q) use($productType){
            return $q->where('type',$productType);
        })->paginate(8);
    }

    public function getProductLimit($productType)
    {
        return $this->repository->query()->with(['category.translations','translations'])->whereHas('types',function ($q) use($productType){
            return $q->where('type',$productType);
        })->paginate(6);
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
