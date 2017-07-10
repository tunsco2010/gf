<?php

namespace App\Queries\GridQueries;

use App\Queries\GridQueries\Contracts\DataQuery;
use DB;

class ItemQuery implements DataQuery
{

    public function data($column, $direction)
    {
        $items = DB::table('items')->select(
            'id as Id',
            'name as Name',
            'price as Price',
            'quantity as Quantity',
            'created_at as Created')
            ->orderBy($column, $direction)
            ->where('deleted_at')
            ->paginate(10);

        return $items;
    }

    public function filteredData($column, $direction, $keyword)
    {
        $items = DB::table('items')->select(
            'id as Id',
            'name as Name',
            'price as Price',
            'quantity as Quantity',
            'created_at as Created')
            ->where('name', 'like', '%' . $keyword . '%')
            ->orderBy($column, $direction)
            ->paginate(10);

        return $s;
    }

}