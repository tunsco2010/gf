<?php

namespace App\Http\Controllers;

use App\InventoryTracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $form = $this->searchParams($request);

        $data = [
            'input'     => $form,
            'trackings' => InventoryTracking::search($form)->paginate(20)->appends($form),
        ];

        return view('inventory.tracking.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    private function searchParams($request)
    {
        return [
            'date_range' => $request->get('date_range', null),
            'product'    => $request->get('product', null),
        ];
    }
}
