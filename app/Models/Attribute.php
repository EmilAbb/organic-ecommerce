<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attribute extends Model
{
  protected $table = 'attributes';
  protected $guarded = [];
    public function categories() :BelongsToMany
    {
        return $this->belongsToMany(Category::class,AttributeCategory::class,'attribute_id','category_id');
    }
}
