<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
