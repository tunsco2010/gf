<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends SuperModel
{
    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'address'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%'.$keyword.'%');
            });
        }

        return $query;
    }
}
