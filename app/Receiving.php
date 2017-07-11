<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Receiving extends Model
{
    public static $rules = [
        'supplier_id' => 'required',
        'user_id'     => 'required',
    ];

    protected $fillable = [
        'supplier_id',
        'user_id',
    ];

    public function supplier()
    {
        return $this->belong(Supplier::class);
    }


    public function items()
    {
        return $this->hasMany(ItemReceiving::class);
    }

    public function getTotalItemAttribute()
    {
        return $this->items->count();
    }

    public function getTotalAmountAttribute()
    {
        return $this->items->map(function ($item) {
            return $item->price * $item->quantity;
        })->sum();
    }

    public static function createAll($input_form)
    {
        return DB::transaction(function () use ($input_form) {
            // create object item
            $items = collect($input_form['items'])->map(function ($singleItem) {
                return new ItemReceiving($singleItem);
            });

            $orders = self::create($input_form);
            $orders->items()->saveMany($items);

            $trackings = $orders->items->each(function ($singleItem) use ($input_form) {
                $tracking = new InventoryTracking([
                    'user_id'    => $input_form['user_id'],
                    'item_id' => $singleItem['item_id'],
                ]);

                // update qty
                $item = Item::find($singleItem['item_id']);
                $item->quantity += $singleItem['quantity'];
                $item->save();

                $item->trackings()->save($tracking);
            });
        });
    }
}
