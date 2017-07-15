<?php

namespace App\Http\Controllers;

use App\Consumption;
use App\Feed;
use App\Http\Requests\Admin\StoreFeedsRequest;
use App\Http\Requests\Admin\UpdateFeedsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FeedController extends Controller
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
    public function index()
    {
        $feeds = Feed::all();
        return view('health.feeds.index', compact('feeds'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('health.feeds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date'=> 'required'

        ]);

        $request->date = $request->date->date_format('Y-m-d');
        $feed = Feed::create($request->all());
        $feed->save();
        alert()->success('Congrats!', 'You added a Feed');
        return Redirect::route('health.feeds.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function show(Feed $id)
    {
        //$consumptions = Consumption::where('stock_id', $id)->get();

        $feed = Feed::findOrFail($id);

        return view('health.feeds.show', compact('feed'));
        //return view('health.feeds.show', compact('feed', 'consumptions'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(Feed $id)
    {
        $feed = Feed::findOrFail($id);
        return view('health.feeds.edit', compact('feed'));

    }


    public function update(UpdateFeedsRequest $request, Feed $id)
    {
        $feed = Feed::findOrFail($id);
        $feed->update($request->all());
        return redirect()->route('health.feeds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feed $id)
    {
        $feed = Feed::findOrFail($id);
        $feed->delete();

        return redirect()->route('health.feeds.index');

    }

    /**
     * Delete all selected Feed at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = Feed::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
