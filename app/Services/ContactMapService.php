<?php

namespace App\Services;

use App\Models\ContactMap;
use App\Repositories\ContactMapRepository;
use Illuminate\Support\Facades\Cache;


class ContactMapService
{
    public function __construct(protected ContactMapRepository $repository)
    {

    }

    public function index()
    {
        return $this->repository->paginate(10);
    }

    public function store($request)
    {
        $data = $request->all();
        $model =  $this->repository->save($data,new ContactMap());
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
       Cache::forget('contact_map');
    }

    public function cachedContactMap()
    {
        return Cache::rememberForever('contact_map',fn() => $this->repository->all());
    }





}
