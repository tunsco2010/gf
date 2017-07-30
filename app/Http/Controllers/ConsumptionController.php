<?php

namespace App\Http\Controllers;

use App\Consumption;
use App\Http\Requests\Admin\StoreConsumptionsRequest;
use App\Http\Requests\Admin\UpdateConsumptionsRequest;
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
        $stocks = \App\Feed::get()->pluck('name', 'id')->prepend('Please select', '');
        $stock_id = \App\Feed::get()->all();
               //var_dump($stock_id);

        return view('consumptions.create', compact('users', 'stocks','stock_id'));

    }

    /**
     * Store a newly created resource in storage.
     *
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

        $users = \App\User::get()->pluck('name', 'id')->prepend('Please select', '');
        $stocks = \App\Feed::get()->pluck('quantity', 'id')->prepend('Please select', '');

        $consumption = Consumption::findOrFail($consumption);

        return view('consumptions.edit', compact('consumption', 'users', 'stocks'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consumption  $consumption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsumptionsRequest $request, Consumption $consumption)
    {
        //
        $consumption = Consumption::findOrFail($consumption);
        $consumption->update($request->all());
        return redirect()->route('consumptions.index');
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
        $consumption = Consumption::findOrFail($consumption);
        $consumption->delete();

        return redirect()->route('consumptions.index');
    }
    /**
     * Delete all selected Consumption at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Consumption::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
