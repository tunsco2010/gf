<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    public $invoice_prefix = 'INV';

    public $tax_percentage = 10;

    public static $rules = [
        'customer_id' => 'required',
        'user_id'  => 'required',
    ];

    /**
     * setup variable mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'user_id',
    ];

    protected $appends = [
        'invoice_no',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function search($params = [])
    {
        return self::when(!empty($params), function ($query) use ($params) {
            switch ($params['date_range']) {
                case 'today':
                    $query->whereDay('created_at', '=', date('d'));
                    break;
                case 'current_week':
                    // $query->where(DB::raw("YEARWEEK(`created_at`, 1) = YEARWEEK(DATE(), 1)"));
                    break;
                case 'current_month':
                    $query->whereMonth('created_at', '=', date('m'));
                    break;
                default:

                    break;
            }

            return $query;
        })->orderBy('created_at', 'DESC');
    }

    public static function createAll($input_form)
    {
        return DB::transaction(function () use ($input_form) {
            // create object item
            $items = collect($input_form['items'])->map(function ($singleItem) {
                return new OrderItem($singleItem);
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
                $item->quantity -= $singleItem['quantity'];
                $item->save();

                $singleItem->trackings()->save($tracking);
            });

            return $orders;
        });
    }

    public function getInvoiceNoAttribute()
    {
        return $this->invoice_prefix.str_pad($this->attributes['id'], 6, 0, STR_PAD_LEFT);
    }

    public function getSubtotalAttribute()
    {
        $subtotal = $this->items->map(function ($item) {
            return $item->price * $item->quantity;
        });

        return $subtotal->sum();
    }

    public function getTaxAttribute()
    {
        return $this->subtotal * ($this->tax_percentage / 100);
    }
}
