<?php

namespace App\Http\Controllers\Admin;

use App\Consumption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreConsumptionsRequest;
use App\Http\Requests\Admin\UpdateConsumptionsRequest;

class ConsumptionsController extends Controller
{
    /**
     * Display a listing of Consumption.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('consumption_access')) {
            return abort(401);
        }

        $consumptions = Consumption::all();

        return view('admin.consumptions.index', compact('consumptions'));
    }

    /**
     * Show the form for creating new Consumption.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('consumption_create')) {
            return abort(401);
        }
        $users = \App\User::get()->pluck('name', 'id')->prepend('Please select', '');$stocks = \App\Feed::get()->pluck('quantity', 'id')->prepend('Please select', '');

        return view('admin.consumptions.create', compact('users', 'stocks'));
    }

    /**
     * Store a newly created Consumption in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsumptionsRequest $request)
    {
        if (! Gate::allows('consumption_create')) {
            return abort(401);
        }
        $consumption = Consumption::create($request->all());
        return redirect()->route('admin.consumptions.index');
    }


    /**
     * Show the form for editing Consumption.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('consumption_edit')) {
            return abort(401);
        }
        $users = \App\User::get()->pluck('name', 'id')->prepend('Please select', '');
        $stocks = \App\Feed::get()->pluck('quantity', 'id')->prepend('Please select', '');

        $consumption = Consumption::findOrFail($id);

        return view('admin.consumptions.edit', compact('consumption', 'users', 'stocks'));
    }

    /**
     * Update Consumption in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsumptionsRequest $request, $id)
    {
        if (! Gate::allows('consumption_edit')) {
            return abort(401);
        }
        $consumption = Consumption::findOrFail($id);
        $consumption->update($request->all());



        return redirect()->route('admin.consumptions.index');
    }


    /**
     * Display Consumption.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('consumption_view')) {
            return abort(401);
        }
        $consumption = Consumption::findOrFail($id);

        return view('admin.consumptions.show', compact('consumption'));
    }


    /**
     * Remove Consumption from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('consumption_delete')) {
            return abort(401);
        }
        $consumption = Consumption::findOrFail($id);
        $consumption->delete();

        return redirect()->route('admin.consumptions.index');
    }

    /**
     * Delete all selected Consumption at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('consumption_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Consumption::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
