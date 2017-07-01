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
}
