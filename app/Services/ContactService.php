<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Contact;
use App\Repositories\AttributeRepository;
use App\Repositories\ContactRepository;
use Illuminate\Support\Facades\Cache;


class ContactService
{
    public function __construct(protected ContactRepository $repository)
    {

    }

    public function index()
    {
        return $this->repository->paginate(10);
    }

    public function store($request)
    {
        $data = $request->all();
        $model =  $this->repository->save($data,new Contact());
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
       Cache::forget('contacts');
    }

    public function cachedContacts()
    {
        return Cache::rememberForever('contacts',fn() => $this->repository->all());
    }





}
