<?php

namespace App\Queries\GridQueries;

use App\Queries\GridQueries\Contracts\DataQuery;
use DB;

class ProductQuery implements DataQuery
{

    public function data($column, $direction)
    {
        $products = DB::table('products')->select(
            'id as Id',
            'name as Name',
            'description as Description',
            'slug as Slug',
            'quantity as Quantity',
            'price as Price',
            'created_at as Created')
//            DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") as Created'))
            ->orderBy($column, $direction)
            ->where('deleted_at')
            ->paginate(10);

        return $products;
    }

    public function filteredData($column, $direction, $keyword)
    {
        $products = DB::table('products')->select(
            'id as Id',
            'name as Name',
            'description as Description',
            'slug as Slug',
            'quantity as Quantity',
            'price as Price',
            DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") as Created'))
            ->where('name', 'like', '%' . $keyword . '%')
            ->orderBy($column, $direction)
            ->paginate(10);

        return $products;
    }

}