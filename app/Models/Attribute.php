<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
  protected $table = 'attributes';
  protected $guarded = [];
    public function categories() :BelongsToMany
    {
        return $this->belongsToMany(Category::class,AttributeCategory::class,'attribute_id','category_id');
    }

    public function values() :HasMany
    {
        return $this->hasMany(AttributeValue::class,'attribute_id','id');
    }
}
