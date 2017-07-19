<?php

namespace App\Http\Controllers;

use App\Vacinecategory;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreVacinecategoriesRequest;
use App\Http\Requests\Admin\UpdateVacinecategoriesRequest;


class VacinecategoriesController extends Controller
{
    /**
     * Display a listing of the vaccine resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacinecategories = Vacinecategory::all();
        return view('vacinecategories.index', compact('vacinecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacinecategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacinecategoriesRequest $request)
    {
        $vacinecategory = Vacinecategory::create($request->all());

        foreach ($request->input('vacines', []) as $data) {
            $vacinecategory->vacine()->create($data);
        }

        return redirect()->route('vacinecategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacinecategory  $vacinecategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Vacinecategory::findOrFail($id);
        $vacines = \App\Vacine::where('category_id', $id)->get();
        $vacinecategory = Vacinecategory::findOrFail($id);
        return view('vacinecategories.show', compact('vacinecategory', 'vacines'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacinecategory  $vacinecategory
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $vacinecategory = Vacinecategory::findOrFail($id);
        $vacinecategory->delete();
        return redirect()->route('vacinecategories.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacinecategory  $vacinecategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacinecategoriesRequest $request, Vacinecategory $id)
    {
        $vacinecategory = Vacinecategory::findOrFail($id);
        $vacinecategory->update($request->all());

        $vacines = $vacinecategory->vacine;
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


        return redirect()->route('vacinecategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacinecategory  $vacinecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacinecategory = Vacinecategory::findOrFail($id);
        $vacinecategory->delete();
        return redirect()->route('vacinecategories.index');
    }

    /**
     * Delete all selected Vacinecategory at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = Vacinecategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
