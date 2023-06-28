<?php

namespace App\Services;

use App\Models\Organic;
use App\Repositories\OrganicRepository;
use Illuminate\Support\Facades\Cache;


class OrganicService
{
    public function __construct(protected OrganicRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function index()
    {
        return $this->repository->paginate(10);
    }

    public function store($request)
    {
        $data = $request->all();
        $data['image'] = $this->fileUploadService->uploadFile($request->image, 'organics');
        $model =  $this->repository->save($data,new Organic());
        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $data['image'] = $this->fileUploadService->replaceFile($request->image, $model->image, 'organics');
        }
        $model =   $this->repository->save($data,$model );
        self::clearCache();
        return $model;
    }


    public function delete($model)
    {
        self::clearCache();
        return $this->repository->delete($model);
    }

    public static function clearCache()
    {
       Cache::forget('organic');
    }

    public function cachedOrganic()
    {
        return Cache::rememberForever('organic',fn() => $this->repository->all());
    }





}
