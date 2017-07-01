<?php

namespace App\Queries\GridQueries;

use App\Queries\GridQueries\Contracts\DataQuery;
use DB;
use Illuminate\Http\Request;

class CustomerQuery implements DataQuery
{
    public function data($column, $direction)
    {
        $customers = DB::table('customers')->select(
            'id as Id',
            'name as Name',
            'slug as Slug',
            'email as Email',
            'phone as Phone',
            DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") as Created'))
            ->orderBy($column, $direction)
            ->where('deleted_at')
            ->paginate(10);

        return $customers;
    }

    public function filteredData($column, $direction, $keyword)
    {
        $customers = DB::table('customers')->select(
            'id as Id',
            'name as Name',
            'email as Email',
            'phone as Phone',
            DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") as Created'))
            ->where('name', 'like', '%' . $keyword . '%')
            ->orderBy($column, $direction)
            ->paginate(10);

        return $customers;
    }
}