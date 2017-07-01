<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends SuperModel
{
    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'company_name',
        'slug',
        'email',
        'phone',
        'address'
    ];

    // Accessors and Mutators
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m-d-Y');
    }



    // Relationships
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
