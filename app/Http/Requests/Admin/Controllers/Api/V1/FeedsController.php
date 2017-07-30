<?php

namespace App\Http\Controllers\Api\V1;

use App\Feed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFeedsRequest;
use App\Http\Requests\Admin\UpdateFeedsRequest;

class FeedsController extends Controller
{
    public function index()
    {
        return Feed::all();
    }

    public function show($id)
    {
        return Feed::findOrFail($id);
    }

    public function update(UpdateFeedsRequest $request, $id)
    {
        $feed = Feed::findOrFail($id);
        $feed->update($request->all());
        

        return $feed;
    }

    public function store(StoreFeedsRequest $request)
    {
        $feed = Feed::create($request->all());
        

        return $feed;
    }

    public function destroy($id)
    {
        $feed = Feed::findOrFail($id);
        $feed->delete();
        return '';
    }
}
