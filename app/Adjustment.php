<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Adjustment extends Model
{
    public static $rules = [
        'user_id' => 'required',
        'items'   => 'required',
    ];

    /**
     * setup variable mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function items()
    {
        return $this->hasMany('App\AdjustmentItem');
    }

    public function getTotalItemAttribute()
    {
        return $this->items->count();
    }

    public static function createAll($input_form)
    {
        return DB::transaction(function () use ($input_form) {
            // create object singleItem
            $items = collect($input_form['items'])->map(function ($singleItem) {
                return new AdjustmentItem($singleItem);
            });

            $adjustments = self::create($input_form);
            $adjustments->items()->saveMany($items);

            $trackings = $adjustments->items->each(function ($singleItem) use ($input_form) {
                $tracking = new InventoryTracking([
                    'user_id'    => $input_form['user_id'],
                    'item_id' => $singleItem['item_id'],
                ]);

                // update qty
                $item = Item::find($singleItem['item_id']);
                //$item->quantity = $item->quantity + $singleItem['diff'];
                $item->quantity += $singleItem['diff'];
                $item->save();

                $singleItem->trackings()->save($tracking);
            });
        });
    }
}
