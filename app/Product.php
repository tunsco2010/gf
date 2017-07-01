<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
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
        'price'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class);
    }
}
