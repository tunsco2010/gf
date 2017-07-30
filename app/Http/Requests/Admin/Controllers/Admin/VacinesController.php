<?php

namespace App\Http\Controllers\Admin;

use App\Vacine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVacinesRequest;
use App\Http\Requests\Admin\UpdateVacinesRequest;

class VacinesController extends Controller
{
    /**
     * Display a listing of Vacine.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('vacine_access')) {
            return abort(401);
        }

        $vacines = Vacine::all();

        return view('admin.vacines.index', compact('vacines'));
    }

    /**
     * Show the form for creating new Vacine.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('vacine_create')) {
            return abort(401);
        }
        $categories = \App\Vacinecategory::get()->pluck('name', 'id')->prepend('Please select', '');
        $enum_interval = Vacine::$enum_interval;
            
        return view('admin.vacines.create', compact('enum_interval', 'categories'));
    }

    /**
     * Store a newly created Vacine in storage.
     *
     * @param  \App\Http\Requests\StoreVacinesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacinesRequest $request)
    {
        if (! Gate::allows('vacine_create')) {
            return abort(401);
        }
        $vacine = Vacine::create($request->all());



        return redirect()->route('admin.vacines.index');
    }


    /**
     * Show the form for editing Vacine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('vacine_edit')) {
            return abort(401);
        }
        $categories = \App\Vacinecategory::get()->pluck('name', 'id')->prepend('Please select', '');
        $enum_interval = Vacine::$enum_interval;
            
        $vacine = Vacine::findOrFail($id);

        return view('admin.vacines.edit', compact('vacine', 'enum_interval', 'categories'));
    }

    /**
     * Update Vacine in storage.
     *
     * @param  \App\Http\Requests\UpdateVacinesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacinesRequest $request, $id)
    {
        if (! Gate::allows('vacine_edit')) {
            return abort(401);
        }
        $vacine = Vacine::findOrFail($id);
        $vacine->update($request->all());



        return redirect()->route('admin.vacines.index');
    }


    /**
     * Display Vacine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('vacine_view')) {
            return abort(401);
        }
        $vacine = Vacine::findOrFail($id);

        return view('admin.vacines.show', compact('vacine'));
    }


    /**
     * Remove Vacine from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('vacine_delete')) {
            return abort(401);
        }
        $vacine = Vacine::findOrFail($id);
        $vacine->delete();

        return redirect()->route('admin.vacines.index');
    }

    /**
     * Delete all selected Vacine at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('vacine_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Vacine::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
