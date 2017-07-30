<?php

namespace App\Http\Controllers\Admin;

use App\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductionsRequest;
use App\Http\Requests\Admin\UpdateProductionsRequest;

class ProductionsController extends Controller
{
    /**
     * Display a listing of Production.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('production_access')) {
            return abort(401);
        }

        $productions = Production::all();

        return view('admin.productions.index', compact('productions'));
    }

    /**
     * Show the form for creating new Production.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('production_create')) {
            return abort(401);
        }        $enum_category = Production::$enum_category;
            
        return view('admin.productions.create', compact('enum_category'));
    }

    /**
     * Store a newly created Production in storage.
     *
     * @param  \App\Http\Requests\StoreProductionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductionsRequest $request)
    {
        if (! Gate::allows('production_create')) {
            return abort(401);
        }
        $production = Production::create($request->all());



        return redirect()->route('admin.productions.index');
    }


    /**
     * Show the form for editing Production.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('production_edit')) {
            return abort(401);
        }        $enum_category = Production::$enum_category;
            
        $production = Production::findOrFail($id);

        return view('admin.productions.edit', compact('production', 'enum_category'));
    }

    /**
     * Update Production in storage.
     *
     * @param  \App\Http\Requests\UpdateProductionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductionsRequest $request, $id)
    {
        if (! Gate::allows('production_edit')) {
            return abort(401);
        }
        $production = Production::findOrFail($id);
        $production->update($request->all());



        return redirect()->route('admin.productions.index');
    }


    /**
     * Display Production.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('production_view')) {
            return abort(401);
        }
        $production = Production::findOrFail($id);

        return view('admin.productions.show', compact('production'));
    }


    /**
     * Remove Production from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('production_delete')) {
            return abort(401);
        }
        $production = Production::findOrFail($id);
        $production->delete();

        return redirect()->route('admin.productions.index');
    }

    /**
     * Delete all selected Production at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('production_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Production::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
