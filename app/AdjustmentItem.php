<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdjustmentItem extends Model
{
    protected $table = 'adjustment_item';

    protected $fillable = [
        'item_id',
        'adjustment',
        'diff',
    ];

    public function trackings()
    {
        return $this->morphOne('App\InventoryTracking', 'trackable');
    }
}
