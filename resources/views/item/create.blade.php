@extends('layouts.master')

@section('title')

    <title>Create a Sale Item</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/item'>Items</a></li>
        <li class='active'>Create</li>
    </ol>

    <h2>Create a Sale Item</h2>

    <hr/>

    <form class="form" role="form" method="POST" action="{{ url('/item') }}">

    {{ csrf_field() }}

        <!-- Price Form Input -->

        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">

            <label class="control-label">Price</label>

            <input type="text" class="form-control" name="price" value="{{ old('price') }}">

            @if ($errors->has('price'))

                <span class="help-block">
        <strong>{{ $errors->first('price') }}</strong>
        </span>

            @endif

        </div>


        <!-- Category Form Input -->

        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">

            <label class="control-label">Category</label>


            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
            </div>

            @if ($errors->has('category'))

                <span class="help-block">
        <strong>{{ $errors->first('category') }}</strong>
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