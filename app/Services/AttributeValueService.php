<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Repositories\AttributeRepository;
use App\Repositories\AttributeValueRepository;
use Illuminate\Support\Facades\Cache;


class AttributeValueService
{
    public function __construct(protected AttributeValueRepository $repository)
    {

    }

    public function index($attributeId)
    {
        return $this->repository->query()->where('attribute_id',$attributeId)->get();
    }

    public function store($request)
    {
        $data = $request->all();
        $model =  $this->repository->save($data,new AttributeValue());
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
       Cache::forget('attribute_values');
    }


}
