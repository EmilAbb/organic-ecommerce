<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\Organic;
use App\Repositories\MenuRepository;
use App\Repositories\OrganicRepository;
use Illuminate\Support\Facades\Cache;


class MenuService
{
    public function __construct(protected MenuRepository $repository)
    {

    }

    public function index()
    {
        return $this->repository->paginate(10);
    }

    public function store($request)
    {
        $data = $request->all();
        $model =  $this->repository->save($data,new Menu());
        self::clearCache();
        return $model;
    }

    public function update($request,$model)
    {
        $data = $request->all();
        $model =   $this->repository->save($data,$model);
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
       Cache::forget('menus');
    }

    public function cachedMenu()
    {
        return Cache::rememberForever('menus',fn() => $this->repository->all());
    }





}
