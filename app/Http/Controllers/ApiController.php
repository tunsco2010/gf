<?php

namespace App\Http\Controllers;

use App\Item;
use App\Supplier;
use App\Queries\GridQueries\CategoryQuery;
use App\Queries\GridQueries\CustomerQuery;
use App\Queries\GridQueries\GridQuery;
use App\Queries\GridQueries\ItemQuery;
use App\Queries\GridQueries\ProductQuery;
use App\Queries\GridQueries\SupplierQuery;
use App\Receiving;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth;
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

    public function storeSales(Request $request)
    {

    }

    public function storeReceiving(Request $request)
    {
        $form = $request->all();

        $auth = app('auth');
        $guard = $auth->guard();
        $user = $guard->user();

        // inject current user id
        $form['user_id'] = $user->id;

        $rules = Receiving::$rules;
        $rules['items'] = 'required';

        $validator = Validator::make($form, $rules);


        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->all()
            ], 400);
        }

        Receiving::createAll($form);

        return response()->json([], 201);
    }

    public function storeAdjustments(Request $request)
    {

    }

    public function itemsList(Request $request)
    {
        $keyword = $request->get('q', '');
        $items = Item::searchByKeyword($keyword)->paginate()->appends(['q' => $keyword]);
        return response()->json($items->toArray());
    }

    public function suppliersList(Request $request)
    {
        $keyword = $request->get('q', '');
        $suppliers = Supplier::searchByKeyword($keyword)->paginate()->appends(['q' => $keyword]);
        return response()->json($suppliers->toArray());
    }
}
