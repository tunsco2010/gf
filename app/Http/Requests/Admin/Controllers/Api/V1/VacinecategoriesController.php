<?php

namespace App\Http\Controllers\Api\V1;

use App\Vacinecategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVacinecategoriesRequest;
use App\Http\Requests\Admin\UpdateVacinecategoriesRequest;

class VacinecategoriesController extends Controller
{
    public function index()
    {
        return Vacinecategory::all();
    }

    public function show($id)
    {
        return Vacinecategory::findOrFail($id);
    }

    public function update(UpdateVacinecategoriesRequest $request, $id)
    {
        $vacinecategory = Vacinecategory::findOrFail($id);
        $vacinecategory->update($request->all());
        

        return $vacinecategory;
    }

    public function store(StoreVacinecategoriesRequest $request)
    {
        $vacinecategory = Vacinecategory::create($request->all());
        

        return $vacinecategory;
    }

    public function destroy($id)
    {
        $vacinecategory = Vacinecategory::findOrFail($id);
        $vacinecategory->delete();
        return '';
    }
}
