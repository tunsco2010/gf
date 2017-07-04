@extends('layouts.master')

@section('title')

    <title>Products</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Products</li>
    </ol>

    <h2>Products</h2>

    <hr/>

    <product-grid></product-grid>

    <div> <a href="/product/create">
            <button type="button" class="btn btn-lg btn-primary">
                Create New
            </button></a>
    </div>


@endsection