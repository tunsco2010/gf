<?php

namespace App\Http\Controllers;

use App\Receiving;
use Illuminate\Http\Request;

class ReceivingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receivings = Receiving::all();
        return view('inventory.receiving.index', compact('receivings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.receiving.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receiving  $receiving
     * @return \Illuminate\Http\Response
     */
    public function show(Receiving $receiving)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receiving  $receiving
     * @return \Illuminate\Http\Response
     */
    public function edit(Receiving $receiving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receiving  $receiving
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receiving $receiving)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receiving  $receiving
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receiving $receiving)
    {
        //
    }
}
