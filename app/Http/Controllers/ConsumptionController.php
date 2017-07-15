<?php

namespace App\Http\Controllers;

use App\Consumption;
use App\Http\Requests\Admin\StoreConsumptionsRequest;
use Illuminate\Http\Request;

class ConsumptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $consumptions = Consumption::all();
        return view('consumptions.index', compact('consumptions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = \App\User::get()->pluck('name', 'id')->prepend('Please select', '');
        $stocks = \App\Feed::get()->pluck('quantity', 'id')->prepend('Please select', '');

        return view('consumptions.create', compact('users', 'stocks'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsumptionsRequest $request)
    {
        $consumption = Consumption::create($request->all());

        alert()->success('Congrats!', 'You Collected '.$request->quantity .' Bag(s) of Feed');
        return redirect()->route('consumptions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function show(Consumption $consumption)
    {
        //
        $consumption = Consumption::findOrFail($consumption);

        return view('consumptions.show', compact('consumption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function edit(Consumption $consumption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consumption $consumption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consumption $consumption)
    {
        //
    }
}
