@extends('layouts.master')

@section('title')

    <title>Request Bag(s) Feed</title>

@endsection

@section('content')
    <h3 class="page-title">@lang('quickadmin.consumption.title')</h3>
    <form class="form" role="form" method="POST" action="{{ url('/health/consumptions') }}">
    {{--{!! Form::open(['method' => 'POST', 'url' => ['health/consumptions'], 'name'=>'create']) !!}--}}
    {{--{{ Form::open(array('action' => 'ConsumptionController@store')) }}--}}
    {{ csrf_field() }}
    <div class="panel panel-primary">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_id', 'Collected By*', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block">who is collecting the feed</p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('stock_id', 'Feed *', ['class' => 'control-label']) !!}
                    <select class="form-control" name="stock_id" id="stock_id">
                        @foreach($stock_id as $listofitem)
                            <option class="" value="{{ $listofitem->id }}">{{ $listofitem->name }}<span> ({{ $listofitem->quantity }})</span></option>
                        @endforeach
                    </select>
                   <p class="help-block"> Feed Category </p>
                    @if($errors->has('stock_id'))
                        <p class="help-block">
                            {{ $errors->first('stock_id') }}
                        </p>
                    @endif

                </div>
            </div>


            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantity', 'Quantity*', ['class' => 'control-label']) !!}
                    {!! Form::number('quantity', old('quantity'), ['class' => 'form-control', 'placeholder' => 'Number of Bags collected', 'required' => '']) !!}
                    <p class="help-block">Number of Bags collected</p>
                    @if($errors->has('quantity'))
                        <p class="help-block">
                            {{ $errors->first('quantity') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', 'Date*', ['class' => 'control-label']) !!}
                    {!! Form::date('date', old('date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => 'Other Details']) !!}
                    <p class="help-block">Other Details</p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script>
        {{--$('.date').datepicker({--}}
            {{--autoclose: true,--}}
            {{--dateFormat: "{{ config('app.date_format_js') }}"--}}
        {{--});--}}
    </script>

@stop