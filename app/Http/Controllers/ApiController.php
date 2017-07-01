<?php

namespace App\Http\Controllers;

use App\Queries\GridQueries\GridQuery;
use App\Queries\GridQueries\SupplierQuery;
use DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        return  GridQuery::sendData($request, new SupplierQuery());
    }
}
