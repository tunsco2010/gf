<?php

namespace App\Http\Controllers\Api\V1;

use App\Vacine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVacinesRequest;
use App\Http\Requests\Admin\UpdateVacinesRequest;

class VacinesController extends Controller
{
    public function index()
    {
        return Vacine::all();
    }

    public function show($id)
    {
        return Vacine::findOrFail($id);
    }

    public function update(UpdateVacinesRequest $request, $id)
    {
        $vacine = Vacine::findOrFail($id);
        $vacine->update($request->all());
        

        return $vacine;
    }

    public function store(StoreVacinesRequest $request)
    {
        $vacine = Vacine::create($request->all());
        

        return $vacine;
    }

    public function destroy($id)
    {
        $vacine = Vacine::findOrFail($id);
        $vacine->delete();
        return '';
    }
}
