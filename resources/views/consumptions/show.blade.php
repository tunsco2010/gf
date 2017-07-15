@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.consumption.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.consumption.fields.user')</th>
                            <td>{{ $consumption->user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td>{{ isset($consumption->user) ? $consumption->user->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.consumption.fields.quantity')</th>
                            <td>{{ $consumption->quantity }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.consumption.fields.date')</th>
                            <td>{{ $consumption->date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.consumption.fields.description')</th>
                            <td>{{ $consumption->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.consumption.fields.stock')</th>
                            <td>{{ $consumption->stock->quantity or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.feed.fields.name')</th>
                            <td>{{ isset($consumption->stock) ? $consumption->stock->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.feed.fields.quantity')</th>
                            <td>{{ isset($consumption->stock) ? $consumption->stock->quantity : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.feed.fields.date')</th>
                            <td>{{ isset($consumption->stock) ? $consumption->stock->date : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.feed.fields.description')</th>
                            <td>{{ isset($consumption->stock) ? $consumption->stock->description : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('consumptions.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop