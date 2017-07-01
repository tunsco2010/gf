@extends('layouts.master')

@section('title')

    <title>Suppliers</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Suppliers</li>
    </ol>

    <h2>Suppliers</h2>

    <hr/>

    <supplier-grid></supplier-grid>

    <div> <a href="/supplier/create">
            <button type="button" class="btn btn-lg btn-primary">
                Create New
            </button></a>
    </div>


@endsection