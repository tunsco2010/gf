@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.vacine.title')</h3>
    
    {!! Form::model($vacine, ['method' => 'PUT', 'route' => ['admin.vacines.update', $vacine->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
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
                    {!! Form::label('category_id', 'Category*', ['class' => 'control-label']) !!}
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('interval', 'Interval*', ['class' => 'control-label']) !!}
                    {!! Form::select('interval', $enum_interval, old('interval'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block">In months</p>
                    @if($errors->has('interval'))
                        <p class="help-block">
                            {{ $errors->first('interval') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('last_vacine_date', 'Last vacine date', ['class' => 'control-label']) !!}
                    {!! Form::text('last_vacine_date', old('last_vacine_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('last_vacine_date'))
                        <p class="help-block">
                            {{ $errors->first('last_vacine_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('next_vacine_date', 'Next vacine date', ['class' => 'control-label']) !!}
                    {!! Form::text('next_vacine_date', old('next_vacine_date'), ['class' => 'form-control date', 'placeholder' => 'Enter the next Vaccine date']) !!}
                    <p class="help-block">Enter the next Vaccine date</p>
                    @if($errors->has('next_vacine_date'))
                        <p class="help-block">
                            {{ $errors->first('next_vacine_date') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>

@stop