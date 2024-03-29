<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];

    public function items() : HasMany
    {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($order) {
            $order->items()->delete();
        });
    }
}
