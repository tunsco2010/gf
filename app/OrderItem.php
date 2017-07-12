<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'item_order';

    protected $fillable = [
        'item_id',
        'price',
        'quantity',
    ];

    public function getSubtotalAttribute()
    {
        return $this->attributes['price'] * $this->attributes['quantity'];
    }



    public function trackings()
    {
        return $this->morphOne(InventoryTracking::class, 'trackable');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
