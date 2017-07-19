<?php

namespace App\Http\Controllers;


use App\Vacine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVacinesRequest;
use App\Http\Requests\Admin\UpdateVacinesRequest;

class VacineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vacines = Vacine::all();

        return view('vacines.index', compact('vacines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Vacinecategory::get()->pluck('name', 'id')->prepend('Please select', '');
        $enum_interval = Vacine::$enum_interval;

        return view('vacines.create', compact('enum_interval', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacinesRequest $request)
    {
        $vacine = Vacine::create($request->all());



        return redirect()->route('vacines.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacine  $vacine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacine = Vacine::findOrFail($id);

        return view('vacines.show', compact('vacine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacine  $vacine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = \App\Vacinecategory::get()->pluck('name', 'id')->prepend('Please select', '');
        $enum_interval = Vacine::$enum_interval;

        $vacine = Vacine::findOrFail($id);

        return view('vacines.edit', compact('vacine', 'enum_interval', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacine  $vacine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacinesRequest $request, $id)
    {
        $vacine = Vacine::findOrFail($id);
        $vacine->update($request->all());

        return redirect()->route('vacines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacine  $vacine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacine = Vacine::findOrFail($id);
        $vacine->delete();
        return redirect()->route('vacines.index');
    }

    /**
     * Delete all selected Vacine at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = Vacine::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
