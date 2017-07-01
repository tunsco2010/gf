<?php

namespace App\Queries\GridQueries;

use App\Queries\GridQueries\Contracts\DataQuery;
use DB;
use Illuminate\Http\Request;

class SupplierQuery implements DataQuery
{
    public function data($column, $direction)
    {
        $suppliers = DB::table('suppliers')->select(
            'id as Id',
            'name as Name',
            'company_name as Company',
            'slug as Slug',
            'email as Email',
            'phone as Phone',
            DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") as Created'))
            ->orderBy($column, $direction)
            ->paginate(10);

        return $suppliers;
    }

    public function filteredData($column, $direction, $keyword)
    {
        $suppliers = DB::table('suppliers')->select(
            'id as Id',
            'name as Name',
            'company_name as Company',
            'email as Email',
            'phone as Phone',
            DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") as Created'))
            ->where('company_name', 'like', '%' . $keyword . '%')
            ->orderBy($column, $direction)
            ->paginate(10);

        return $suppliers;
    }
}