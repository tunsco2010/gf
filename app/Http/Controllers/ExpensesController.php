<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExpensesRequest;
use App\Http\Requests\Admin\UpdateExpensesRequest;

class ExpensesController extends Controller
{
    /**
     * Display a listing of Expense.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $expenses = Expense::all();

        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating new Expense.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $expense_categories = \App\ExpenseCategory::get()->pluck('name', 'id')->prepend('Please select', '');

        return view('expenses.create', compact('expense_categories'));
    }

    /**
     * Store a newly created Expense in storage.
     *
     * @param  StoreExpensesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpensesRequest $request)
    {

        $expense = Expense::create($request->all());



        return redirect()->route('expenses.index');
    }


    /**
     * Show the form for editing Expense.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $expense_categories = \App\ExpenseCategory::get()->pluck('name', 'id')->prepend('Please select', '');

        $expense = Expense::findOrFail($id);

        return view('expenses.edit', compact('expense', 'expense_categories'));
    }

    /**
     * Update Expense in storage.
     *
     * @param  \UpdateExpensesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpensesRequest $request, $id)
    {

        $expense = Expense::findOrFail($id);
        $expense->update($request->all());



        return redirect()->route('expenses.index');
    }


    /**
     * Display Expense.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $expense = Expense::findOrFail($id);

        return view('expenses.show', compact('expense'));
    }


    /**
     * Remove Expense from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index');
    }

    /**
     * Delete all selected Expense at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = Expense::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
