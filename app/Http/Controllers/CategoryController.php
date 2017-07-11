<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
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
        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::pluck('name', 'id');
        return view('category.create', compact('products'));
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

        $product = Product::find($request->product);

        $category = Category::create([
            'name' => $product->name. "-" .$request->name,
            'slug' => $slug,
            'description' => $request->description,
            'product_id' => $product->id
        ]);


        $category->save();

        alert()->success('Congrats!', 'You added a Product Category');

        return Redirect::route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, $slug = '')
    {
        if ($category->slug !== $slug) {
            return Redirect::route('category.show', [
                'id' => $category->id,
                'slug' => $category->slug
            ], 301);
        }
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string|max:40|unique:categories,name,'
                .$category->id
        ]);

        $slug = str_slug($request->name, "-");

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $slug
        ]);

        alert()->success('Congrats!', 'You updated the product category');

        return Redirect::route('category.show', ['category' => $category, 'slug' =>$slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        alert()->overlay('Attention!', 'You deleted the product category', 'error');

        return Redirect::route('category.index');
    }
}
