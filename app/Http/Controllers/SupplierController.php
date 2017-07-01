<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $suppliers = Supplier::paginate(10);
//        return view('supplier.index', compact('suppliers'));
        return view('supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [

            'name' => 'required|string|max:30',
            'company_name' => 'required|unique:suppliers|string|max:30'

        ]);

        $slug = str_slug($request->company_name, "-");

        $supplier = Supplier::create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'slug' => $slug,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        $supplier->save();

        alert()->success('Congrats!', 'You added a Supplier');

        return Redirect::route('supplier.index');

    }

    /**
     * Display the specified resource.
     *
     * @param Supplier $supplier
     * @param string $slug
     * @return \Illuminate\Http\Response
     * @internal param $id
     * @internal param Supplier $supplier
     */
    public function show(Supplier $supplier, $slug = '')
    {
        if ($supplier->slug !== $slug) {
            return Redirect::route('supplier.show', [
                'id' => $supplier->id,
                'slug' => $supplier->slug
            ], 301);
        }
        return view('supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Supplier $supplier
     * @return \Illuminate\Http\Response
     * @internal param $id
     * @internal param Supplier $supplier
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request, [
            'name' => 'required|string|max:30',
            'company_name' => 'required|string|max:40|unique:suppliers,name,' .$supplier->id
        ]);

        $slug = str_slug($request->company_name, "-");

        $supplier->update([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'slug' => $slug,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        alert()->success('Congrats!', 'You updated the supplier');

        return Redirect::route('supplier.show', ['supplier' => $supplier, 'slug' =>$slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Supplier $supplier
     */
    public function destroy($id)
    {
        Supplier::destroy($id);

        alert()->overlay('Attention!', 'You deleted the supplier', 'error');

        return Redirect::route('supplier.index');
    }
}
