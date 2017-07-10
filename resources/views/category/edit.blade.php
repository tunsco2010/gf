@extends('layouts.master')

@section('title')

    <title>Edit Product</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/product'>Products</a></li>
        <li class='active'>Edit</li>
    </ol>

    <h2>Edit a Product</h2>

    <hr/>

    <form class="form" role="form" method="POST" action="{{ url('/product/'. $product->id) }}">

    {{ method_field('PATCH') }}

    {{ csrf_field() }}

    <!-- name Form Input -->

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label class="control-label">Name</label>

            <input type="text" class="form-control" name="name" value="{{ $product->name }}">

            @if ($errors->has('name'))

                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>

            @endif

        </div>


        <!-- Description Form Input -->

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

            <label class="control-label">Description</label>

            <textarea class="form-control" name="description" >
                  {!! $product->description !!}
            </textarea>

            @if ($errors->has('description'))

                <span class="help-block">
        <strong>{{ $errors->first('description') }}</strong>
        </span>

            @endif

        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">

                Update

            </button>

        </div>

    </form>

@endsection