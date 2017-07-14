@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.feed.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.feed.fields.name')</th>
                            <td>{{ $feed->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.feed.fields.quantity')</th>
                            <td>{{ $feed->quantity }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.feed.fields.date')</th>
                            <td>{{ $feed->date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.feed.fields.description')</th>
                            <td>{{ $feed->description }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#consumption" aria-controls="consumption" role="tab" data-toggle="tab">Feeds Consumption</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="consumption">
<table class="table table-bordered table-striped {{ count($consumptions) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.consumption.fields.user')</th>
                        <th>@lang('quickadmin.users.fields.name')</th>
                        <th>@lang('quickadmin.consumption.fields.quantity')</th>
                        <th>@lang('quickadmin.consumption.fields.date')</th>
                        <th>@lang('quickadmin.consumption.fields.description')</th>
                        <th>@lang('quickadmin.consumption.fields.stock')</th>
                        <th>@lang('quickadmin.feed.fields.name')</th>
                        <th>@lang('quickadmin.feed.fields.quantity')</th>
                        <th>@lang('quickadmin.feed.fields.date')</th>
                        <th>@lang('quickadmin.feed.fields.description')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($consumptions) > 0)
            @foreach ($consumptions as $consumption)
                <tr data-entry-id="{{ $consumption->id }}">
                    <td>{{ $consumption->user->name or '' }}</td>
<td>{{ isset($consumption->user) ? $consumption->user->name : '' }}</td>
                                <td>{{ $consumption->quantity }}</td>
                                <td>{{ $consumption->date }}</td>
                                <td>{{ $consumption->description }}</td>
                                <td>{{ $consumption->stock->quantity or '' }}</td>
<td>{{ isset($consumption->stock) ? $consumption->stock->name : '' }}</td>
<td>{{ isset($consumption->stock) ? $consumption->stock->quantity : '' }}</td>
<td>{{ isset($consumption->stock) ? $consumption->stock->date : '' }}</td>
<td>{{ isset($consumption->stock) ? $consumption->stock->description : '' }}</td>
                                <td>
                                    @can('consumption_view')
                                    <a href="{{ route('admin.consumptions.show',[$consumption->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('consumption_edit')
                                    <a href="{{ route('admin.consumptions.edit',[$consumption->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('consumption_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.consumptions.destroy', $consumption->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.feeds.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop