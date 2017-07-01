<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
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
        return view('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'email' => 'required|email|unique:customers'
        ]);

        $slug = str_slug($request->email, "-");

        $customer = Customer::create([
            'name' => $request->name,
            'slug' => $slug,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);


        $customer->save();

        alert()->success('Congrats!', 'You added a Customer');

        return Redirect::route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer $customer
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, $slug = '')
    {
        if ($customer->slug !== $slug) {
            return Redirect::route('customer.show', [
                'id' => $customer->id,
                'slug' => $customer->slug
            ], 301);
        }
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'name' => 'required|string|max:30',
            'email' => 'required|email|max:40|unique:customers,name,' .$customer->id
        ]);

        $slug = str_slug($request->email, "-");

        $customer->update([
            'name' => $request->name,
            'slug' => $slug,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        alert()->success('Congrats!', 'You updated the customer');

        return Redirect::route('customer.show', ['customer' => $customer, 'slug' =>$slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Customer $customer
     */
    public function destroy($id)
    {
        Customer::destroy($id);

        alert()->overlay('Attention!', 'You deleted the customer', 'error');

        return Redirect::route('customer.index');
    }
}
