<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
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
        return view('item.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'price' => 'required'
        ]);

        $category = Category::find($request->category);
        $code =  $category->product->name. "-" . $category->name;

        $item= Item::create([
            'name' => $code,
            'code' => $code,
            'quantity' => 0,
            'price' => $request->price,
            'category_id' => $category->id
        ]);

        $item->save();

        alert()->success('Congrats!', 'You added an Item');

        return Redirect::route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        if (!$item->id) {
            return Redirect::route('item.show', [
                'id' => $item->id
            ], 301);
        }
        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->validate($request, [
            'name' => 'required|string|max:40|unique:items,name,'
                .$item->id
        ]);

        //$slug = str_slug($request->name, "-");

        $item->update([
            'name' => $request->name,
            'code' => $request->code,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);

        alert()->success('Congrats!', 'You updated the item');

        return Redirect::route('item.show', ['item' => $item]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Item::destroy($item->id);

        alert()->overlay('Attention!', 'You deleted the item', 'error');

        return Redirect::route('item.index');
    }
}
