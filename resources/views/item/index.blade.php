@extends('layouts.master')

@section('title')

    <title>Items</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Items</li>
    </ol>

    <h2>Items</h2>

    <hr/>

    <item-grid></item-grid>

    <div> <a href="/item/create">
            <button type="button" class="btn btn-lg btn-primary">
                Create New
            </button></a>
    </div>


@endsection