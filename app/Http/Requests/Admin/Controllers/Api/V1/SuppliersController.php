<?php

namespace App\Http\Controllers\Api\V1;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSuppliersRequest;
use App\Http\Requests\Admin\UpdateSuppliersRequest;

class SuppliersController extends Controller
{
    public function index()
    {
        return Supplier::all();
    }

    public function show($id)
    {
        return Supplier::findOrFail($id);
    }

    public function update(UpdateSuppliersRequest $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        

        return $supplier;
    }

    public function store(StoreSuppliersRequest $request)
    {
        $supplier = Supplier::create($request->all());
        

        return $supplier;
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return '';
    }
}
