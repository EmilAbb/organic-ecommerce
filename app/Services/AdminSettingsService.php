<?php

namespace App\Services;

use App\Models\AdminSetting;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Contact;
use App\Repositories\AdminSettingsRepository;
use App\Repositories\AttributeRepository;
use App\Repositories\ContactRepository;
use Illuminate\Support\Facades\Cache;


class AdminSettingsService
{
    public function __construct(protected AdminSettingsRepository $repository,protected FileUploadService $fileUploadService)
    {

    }

    public function index()
    {
        return $this->repository->paginate(10);
    }

    public function store($request)
    {
        $data = $request->all();
        $data['image'] = $this->fileUploadService->uploadFile($request->image, 'admin-settings');
        $model =  $this->repository->save($data,new AdminSetting());
        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
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
       Cache::forget('admin_settings');
    }

    public function cachedAdminSettings()
    {
        return Cache::rememberForever('admin_settings',fn() => $this->repository->all());
    }





}
