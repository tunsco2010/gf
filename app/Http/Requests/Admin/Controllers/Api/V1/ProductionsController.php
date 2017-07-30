<?php

namespace App\Http\Controllers\Api\V1;

use App\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductionsRequest;
use App\Http\Requests\Admin\UpdateProductionsRequest;

class ProductionsController extends Controller
{
    public function index()
    {
        return Production::all();
    }

    public function show($id)
    {
        return Production::findOrFail($id);
    }

    public function update(UpdateProductionsRequest $request, $id)
    {
        $production = Production::findOrFail($id);
        $production->update($request->all());
        

        return $production;
    }

    public function store(StoreProductionsRequest $request)
    {
        $production = Production::create($request->all());
        

        return $production;
    }

    public function destroy($id)
    {
        $production = Production::findOrFail($id);
        $production->delete();
        return '';
    }
}
