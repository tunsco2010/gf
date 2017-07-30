<?php

namespace App\Http\Controllers\Admin;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSuppliersRequest;
use App\Http\Requests\Admin\UpdateSuppliersRequest;

class SuppliersController extends Controller
{
    /**
     * Display a listing of Supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('supplier_access')) {
            return abort(401);
        }

        $suppliers = Supplier::all();

        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating new Supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('supplier_create')) {
            return abort(401);
        }
        $products = \App\Product::get()->pluck('name', 'id')->prepend('Please select', '');

        return view('admin.suppliers.create', compact('products'));
    }

    /**
     * Store a newly created Supplier in storage.
     *
     * @param  \App\Http\Requests\StoreSuppliersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuppliersRequest $request)
    {
        if (! Gate::allows('supplier_create')) {
            return abort(401);
        }
        $supplier = Supplier::create($request->all());



        return redirect()->route('admin.suppliers.index');
    }


    /**
     * Show the form for editing Supplier.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('supplier_edit')) {
            return abort(401);
        }
        $products = \App\Product::get()->pluck('name', 'id')->prepend('Please select', '');

        $supplier = Supplier::findOrFail($id);

        return view('admin.suppliers.edit', compact('supplier', 'products'));
    }

    /**
     * Update Supplier in storage.
     *
     * @param  \App\Http\Requests\UpdateSuppliersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuppliersRequest $request, $id)
    {
        if (! Gate::allows('supplier_edit')) {
            return abort(401);
        }
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());



        return redirect()->route('admin.suppliers.index');
    }


    /**
     * Display Supplier.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('supplier_view')) {
            return abort(401);
        }
        $supplier = Supplier::findOrFail($id);

        return view('admin.suppliers.show', compact('supplier'));
    }


    /**
     * Remove Supplier from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('supplier_delete')) {
            return abort(401);
        }
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('admin.suppliers.index');
    }

    /**
     * Delete all selected Supplier at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('supplier_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Supplier::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
