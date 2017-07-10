<?php

namespace App\Queries\GridQueries;

use App\Queries\GridQueries\Contracts\DataQuery;
use DB;

class CategoryQuery implements DataQuery
{

    public function data($column, $direction)
    {
        $categories = DB::table('categories')->select(
            'id as Id',
            'name as Name',
            'description as Description',
            'slug as Slug',
            'created_at as Created')
//            DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") as Created'))
            ->orderBy($column, $direction)
            ->paginate(10);

        return $categories;
    }

    public function filteredData($column, $direction, $keyword)
    {
        $categories = DB::table('categories')->select(
            'id as Id',
            'name as Name',
            'description as Description',
            'slug as Slug',
            'created_at as Created')
           // DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") as Created'))
            ->where('name', 'like', '%' . $keyword . '%')
            ->orderBy($column, $direction)
            ->paginate(10);

        return $categories;
    }

}