<?php

namespace App;

use Carbon\Carbon;
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
    


    // Relationships
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
