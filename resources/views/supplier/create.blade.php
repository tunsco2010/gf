@extends('layouts.master')

@section('title')

    <title>Create a Supplier</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/supplier'>Suppliers</a></li>
        <li class='active'>Create</li>
    </ol>

    <h2>Create a New Supplier</h2>

    <hr/>

    <form class="form" role="form" method="POST" action="{{ url('/supplier') }}">

    {{ csrf_field() }}

    <!-- name Form Input -->

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label class="control-label">Contact Person</label>

            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

            @if ($errors->has('name'))

                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>

            @endif

        </div>

        <!-- Company Name Form Input -->

        <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">

            <label class="control-label">Company Name</label>

            <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">

            @if ($errors->has('company_name'))

                <span class="help-block">
        <strong>{{ $errors->first('company_name') }}</strong>
        </span>

            @endif

        </div>


        <!-- Email Form Input -->

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <label class="control-label">Email</label>

            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))

                <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
        </span>

            @endif

        </div>


        <!-- Phone Form Input -->

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

            <label class="control-label">Phone</label>

            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">

            @if ($errors->has('phone'))

                <span class="help-block">
        <strong>{{ $errors->first('phone') }}</strong>
        </span>

            @endif

        </div>


        <!-- Address Form Input -->

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">

            <label class="control-label">Address</label>

            <textarea class="form-control" name="address" >
                    {{ old('address') }}
            </textarea>

            @if ($errors->has('address'))

                <span class="help-block">
        <strong>{{ $errors->first('address') }}</strong>
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