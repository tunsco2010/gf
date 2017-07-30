<?php

namespace App\Http\Controllers\Admin;

use App\Vacinecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVacinecategoriesRequest;
use App\Http\Requests\Admin\UpdateVacinecategoriesRequest;

class VacinecategoriesController extends Controller
{
    /**
     * Display a listing of Vacinecategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('vacinecategory_access')) {
            return abort(401);
        }

        $vacinecategories = Vacinecategory::all();

        return view('admin.vacinecategories.index', compact('vacinecategories'));
    }

    /**
     * Show the form for creating new Vacinecategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('vacinecategory_create')) {
            return abort(401);
        }
        return view('admin.vacinecategories.create');
    }

    /**
     * Store a newly created Vacinecategory in storage.
     *
     * @param  \App\Http\Requests\StoreVacinecategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacinecategoriesRequest $request)
    {
        if (! Gate::allows('vacinecategory_create')) {
            return abort(401);
        }
        $vacinecategory = Vacinecategory::create($request->all());

        foreach ($request->input('vacines', []) as $data) {
            $vacinecategory->vacine()->create($data);
        }


        return redirect()->route('admin.vacinecategories.index');
    }


    /**
     * Show the form for editing Vacinecategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('vacinecategory_edit')) {
            return abort(401);
        }
        $vacinecategory = Vacinecategory::findOrFail($id);

        return view('admin.vacinecategories.edit', compact('vacinecategory'));
    }

    /**
     * Update Vacinecategory in storage.
     *
     * @param  \App\Http\Requests\UpdateVacinecategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacinecategoriesRequest $request, $id)
    {
        if (! Gate::allows('vacinecategory_edit')) {
            return abort(401);
        }
        $vacinecategory = Vacinecategory::findOrFail($id);
        $vacinecategory->update($request->all());

        $vacines           = $vacinecategory->vacine;
        $currentVacineData = [];
        foreach ($request->input('vacines', []) as $index => $data) {
            if (is_integer($index)) {
                $vacinecategory->vacine()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentVacineData[$id] = $data;
            }
        }
        foreach ($vacines as $item) {
            if (isset($currentVacineData[$item->id])) {
                $item->update($currentVacineData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.vacinecategories.index');
    }


    /**
     * Display Vacinecategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('vacinecategory_view')) {
            return abort(401);
        }
        $vacines = \App\Vacine::where('category_id', $id)->get();

        $vacinecategory = Vacinecategory::findOrFail($id);

        return view('admin.vacinecategories.show', compact('vacinecategory', 'vacines'));
    }


    /**
     * Remove Vacinecategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('vacinecategory_delete')) {
            return abort(401);
        }
        $vacinecategory = Vacinecategory::findOrFail($id);
        $vacinecategory->delete();

        return redirect()->route('admin.vacinecategories.index');
    }

    /**
     * Delete all selected Vacinecategory at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('vacinecategory_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Vacinecategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
