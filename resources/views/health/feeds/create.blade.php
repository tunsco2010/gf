@extends('layouts.master')

@section('title')

    <title>Create Feeds</title>

@endsection

@section('content')
    <h3 class="page-title">Create Feed</h3>
    {{--{!! Form::open(['action'=>'FeedController@store','method' => 'POST']) !!}--}}
    {{--{!! Form::open(['method' => 'POST', 'route' => ['health.feeds.store']]) !!}--}}
    {!! Form::open(['method' => 'POST', 'url' => ['health/feeds/store']]) !!}
    {{ csrf_field() }}
    <div class="panel panel-default">
        <div class="panel-heading">
           Create
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantity', 'Quantity*', ['class' => 'control-label']) !!}
                    {!! Form::number('quantity', old('quantity'), ['class' => 'form-control', 'placeholder' => 'Enter the Number of Bags', 'required' => '']) !!}
                    <p class="help-block">Enter the Number of Bags</p>
                    @if($errors->has('quantity'))
                        <p class="help-block">
                            {{ $errors->first('quantity') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', 'Date supplied', ['class' => 'control-label']) !!}
                    {!! Form::date('date', old('date'), ['class' => 'form-control date', 'placeholder' => 'Supplied Date']) !!}
                    <p class="help-block">Supplied Date</p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description*', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => 'Details of  who supplied and what quantity', 'required' => '']) !!}
                    <p class="help-block">Details of  who supplied and what quantity</p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('Save'), ['class' => 'form-control btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('Y-m-d') }}"
        });
    </script>

@stop