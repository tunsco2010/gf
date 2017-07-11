<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemReceiving extends Model
{

    protected $table = 'item_receiving';

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
}
