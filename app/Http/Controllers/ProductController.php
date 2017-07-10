<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
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
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'name' => 'required',
        ]);

        $slug = str_slug($request->name, "-");

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug
        ]);

        $product->save();

        alert()->success('Congrats!', 'You added a Product');

        return Redirect::route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $slug = '')
    {
        if ($product->slug !== $slug) {
            return Redirect::route('product.show', [
                'id' => $product->id,
                'slug' => $product->slug
            ], 301);
        }
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required|string|max:40|unique:products,name,'
                .$product->id
        ]);

        $slug = str_slug($request->name, "-");

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug
        ]);

        alert()->success('Congrats!', 'You updated the product');

        return Redirect::route('product.show', ['product' => $product, 'slug' =>$slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);

        alert()->overlay('Attention!', 'You deleted the product', 'error');

        return Redirect::route('product.index');
    }
}
