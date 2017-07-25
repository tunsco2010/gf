<?php

namespace App\Http\Controllers;

use App\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreIncomesRequest;
use App\Http\Requests\Admin\UpdateIncomesRequest;

class IncomesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of Income.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $incomes = Income::all();

        return view('incomes.index', compact('incomes'));
    }

    /**
     * Show the form for creating new Income.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $income_categories = \App\IncomeCategory::get()->pluck('name', 'id')->prepend('Please select', '');

        return view('incomes.create', compact('income_categories'));
    }

    /**
     * Store a newly created Income in storage.
     */
    public function store(StoreIncomesRequest $request)
    {

        $income = Income::create($request->all());



        return redirect()->route('incomes.index');
    }


    /**
     * Show the form for editing Income.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $income_categories = \App\IncomeCategory::get()->pluck('name', 'id')->prepend('Please select', '');

        $income = Income::findOrFail($id);

        return view('incomes.edit', compact('income', 'income_categories'));
    }

    /**
     * Update Income in storage.
     */
    public function update(UpdateIncomesRequest $request, $id)
    {

        $income = Income::findOrFail($id);
        $income->update($request->all());



        return redirect()->route('incomes.index');
    }


    /**
     * Display Income.
     */
    public function show($id)
    {

        $income = Income::findOrFail($id);

        return view('incomes.show', compact('income'));
    }


    /**
     * Remove Income from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $income = Income::findOrFail($id);
        $income->delete();

        return redirect()->route('incomes.index');
    }

    /**
     * Delete all selected Income at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = Income::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
