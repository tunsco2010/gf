<?php

namespace App\Http\Controllers;

use App\Queries\GridQueries\CategoryQuery;
use App\Queries\GridQueries\CustomerQuery;
use App\Queries\GridQueries\GridQuery;
use App\Queries\GridQueries\ItemQuery;
use App\Queries\GridQueries\ProductQuery;
use App\Queries\GridQueries\SupplierQuery;
use DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function suppliersIndex(Request $request)
    {
        return  GridQuery::sendData($request, new SupplierQuery());
    }

    public function customersIndex(Request $request)
    {
        return  GridQuery::sendData($request, new CustomerQuery());
    }

    public function productsIndex(Request $request)
    {
        return  GridQuery::sendData($request, new ProductQuery());
    }

    public function itemsIndex(Request $request)
    {
        return  GridQuery::sendData($request, new ItemQuery());
    }

    public function CategoriesIndex(Request $request)
    {
        return  GridQuery::sendData($request, new CategoryQuery());
    }
}
