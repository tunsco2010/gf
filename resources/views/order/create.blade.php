@extends('layouts.master')

@section('title')

    <title>Place Order</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Order</li>
    </ol>

    <h2>Place Order</h2>
    <hr>

    <orders></orders>


@endsection