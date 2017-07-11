<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];


    protected $fillable = [
        'name',
        'description',
        'code',
        'quantity',
        'price',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('code', 'LIKE', '%'.$keyword.'%');
            });
        }

        return $query;
    }
}
