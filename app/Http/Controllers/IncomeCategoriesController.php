<?php

namespace App\Http\Controllers;

use App\IncomeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreIncomeCategoriesRequest;
use App\Http\Requests\Admin\UpdateIncomeCategoriesRequest;

class IncomeCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of IncomeCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income_categories = IncomeCategory::all();

        return view('income_categories.index', compact('income_categories'));
    }

    /**
     * Show the form for creating new IncomeCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('income_categories.create');
    }

    /**
     * Store a newly created IncomeCategory in storage.
     *
     * @param  StoreIncomeCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeCategoriesRequest $request)
    {
        if (! Gate::allows('income_category_create')) {
            return abort(401);
        }
        $income_category = IncomeCategory::create($request->all());



        return redirect()->route('income_categories.index');
    }


    /**
     * Show the form for editing IncomeCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $income_category = IncomeCategory::findOrFail($id);
        return view('income_categories.edit', compact('income_category'));
    }

    /**
     * Update IncomeCategory in storage.
     *
     * \UpdateIncomeCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomeCategoriesRequest $request, $id)
    {

        $income_category = IncomeCategory::findOrFail($id);
        $income_category->update($request->all());
        return redirect()->route('income_categories.index');
    }


    /**
     * Display IncomeCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $incomes = \App\Income::where('income_category_id', $id)->get();

        $income_category = IncomeCategory::findOrFail($id);

        return view('income_categories.show', compact('income_category', 'incomes'));
    }


    /**
     * Remove IncomeCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $income_category = IncomeCategory::findOrFail($id);
        $income_category->delete();

        return redirect()->route('income_categories.index');
    }

    /**
     * Delete all selected IncomeCategory at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = IncomeCategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
