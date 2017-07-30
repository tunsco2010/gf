<?php

namespace App\Http\Controllers\Admin;

use App\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFeedsRequest;
use App\Http\Requests\Admin\UpdateFeedsRequest;

class FeedsController extends Controller
{
    /**
     * Display a listing of Feed.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('feed_access')) {
            return abort(401);
        }

        $feeds = Feed::all();

        return view('admin.feeds.index', compact('feeds'));
    }

    /**
     * Show the form for creating new Feed.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('feed_create')) {
            return abort(401);
        }
        return view('admin.feeds.create');
    }

    /**
     * Store a newly created Feed in storage.
     *
     * @param  \App\Http\Requests\StoreFeedsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeedsRequest $request)
    {
        if (! Gate::allows('feed_create')) {
            return abort(401);
        }
        $feed = Feed::create($request->all());



        return redirect()->route('admin.feeds.index');
    }


    /**
     * Show the form for editing Feed.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('feed_edit')) {
            return abort(401);
        }
        $feed = Feed::findOrFail($id);

        return view('admin.feeds.edit', compact('feed'));
    }

    /**
     * Update Feed in storage.
     *
     * @param  \App\Http\Requests\UpdateFeedsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeedsRequest $request, $id)
    {
        if (! Gate::allows('feed_edit')) {
            return abort(401);
        }
        $feed = Feed::findOrFail($id);
        $feed->update($request->all());



        return redirect()->route('admin.feeds.index');
    }


    /**
     * Display Feed.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('feed_view')) {
            return abort(401);
        }
        $consumptions = \App\Consumption::where('stock_id', $id)->get();

        $feed = Feed::findOrFail($id);

        return view('admin.feeds.show', compact('feed', 'consumptions'));
    }


    /**
     * Remove Feed from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('feed_delete')) {
            return abort(401);
        }
        $feed = Feed::findOrFail($id);
        $feed->delete();

        return redirect()->route('admin.feeds.index');
    }

    /**
     * Delete all selected Feed at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('feed_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Feed::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
