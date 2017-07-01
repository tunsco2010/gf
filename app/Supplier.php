<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone',
        'address'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
