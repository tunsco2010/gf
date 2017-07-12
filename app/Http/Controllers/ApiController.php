<?php

namespace App\Http\Controllers;

use App\Adjustment;
use App\Customer;
use App\Item;
use App\Order;
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

        $form = $request->all();

        // inject current cashier id
        $form['user_id'] = $request->user()->id;

        $rules = Order::$rules;
        $rules['items'] = 'required';

        $validator = Validator::make($form, $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->all(),
            ], 400);
        }

        $order = Order::createAll($form);

        return response()->json($order, 201);

    }

    public function storeReceiving(Request $request)
    {
        $form = $request->all();

        // inject current user id
        $form['user_id'] = $request->user()->id;

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
        $form = $request->all();

//        $auth = app('auth');
//        $guard = $auth->guard();
//        $user = $guard->user();
        //$form['user_id'] = $user->id;

        // inject current user id
        $form['user_id'] = $request->user()->id;

        $rules = Adjustment::$rules;
        $rules['items'] = 'required';

        $validator = Validator::make($form, $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->all(),
            ], 400);
        }

        Adjustment::createAll($form);

        return response()->json([], 201);
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

    public function customersList(Request $request)
    {
        $keyword = $request->get('q', '');
        $customers = Customer::searchByKeyword($keyword)->paginate()->appends(['q' => $keyword]);
        return response()->json($customers->toArray());
    }
}
