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
        echo"I am here in side it....<br/>";
        return Vacinecategory::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo"I am here in side create....<br/>";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacinecategoriesRequest $request)
    {
        echo"I am here in side it Store....<br/>";
        $vacinecategory = Vacinecategory::create($request->all());
        return $vacinecategory;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacinecategory  $vacinecategory
     * @return \Illuminate\Http\Response
     */
    public function show(Vacinecategory $id)
    {
        return Vacinecategory::findOrFail($id);
        echo"I am here in side Show<br/>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacinecategory  $vacinecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacinecategory $vacinecategory)
    {
        //
        echo"I am here in side edit....<br/>";
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
        return $vacinecategory;
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
        return '';
    }
}
