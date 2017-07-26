@extends('layouts.master')

@section('title')

    <title>Create a Product</title>

@endsection

@section('content')
    <hr/> <hr/> <hr/> <hr/>
    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/product'>Products</a></li>
        <li class='active'>Create</li>
    </ol>

    <h2>Create a New Product</h2>

    <hr/>

    <form class="form" role="form" method="POST" action="{{ url('/product') }}">

    {{ csrf_field() }}

    <!-- name Form Input -->

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label class="control-label">Name</label>

            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

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
                    {{ old('description') }}
            </textarea>

            @if ($errors->has('description'))

                <span class="help-block">
        <strong>{{ $errors->first('description') }}</strong>
        </span>

            @endif

        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">

                Create

            </button>

        </div>

    </form>

@endsection