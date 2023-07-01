<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTranslation extends Model
{
  protected $table = 'product_translations';
    protected $guarded = [];
  public $timestamps = false;

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
