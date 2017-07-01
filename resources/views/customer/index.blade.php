@extends('layouts.master')

@section('title')

    <title>Customers</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Customers</li>
    </ol>

    <h2>Customers</h2>

    <hr/>

    <customer-grid></customer-grid>

    <div> <a href="/customer/create">
            <button type="button" class="btn btn-lg btn-primary">
                Create New
            </button></a>
    </div>


@endsection