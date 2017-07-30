<?php

namespace App\Http\Controllers\Api\V1;

use App\Consumption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreConsumptionsRequest;
use App\Http\Requests\Admin\UpdateConsumptionsRequest;

class ConsumptionsController extends Controller
{
    public function index()
    {
        return Consumption::all();
    }

    public function show($id)
    {
        return Consumption::findOrFail($id);
    }

    public function update(UpdateConsumptionsRequest $request, $id)
    {
        $consumption = Consumption::findOrFail($id);
        $consumption->update($request->all());
        

        return $consumption;
    }

    public function store(StoreConsumptionsRequest $request)
    {
        $consumption = Consumption::create($request->all());
        

        return $consumption;
    }

    public function destroy($id)
    {
        $consumption = Consumption::findOrFail($id);
        $consumption->delete();
        return '';
    }
}
