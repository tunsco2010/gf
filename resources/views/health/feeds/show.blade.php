@extends('layouts.app')

@section('content')
    <h3 class="page-title">Feed</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Name</th>
                            <td>{{ $feed->name }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $feed->quantity }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ $feed->date }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
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
            <th>User</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Description</th>
            <th>Stock</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Date</th>
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
                                <td>

                                    <a href="{{ route('health.consumptions.show',[$consumption->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>

                                    <a href="{{ route('health.consumptions.edit',[$consumption->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>

                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are_you_sure")."');",
                                        'url' => ['health/consumptions/destroy', $consumption->id])) !!}
                                    {!! Form::submit(trans('delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">No entries in table</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('health.feeds.index') }}" class="btn btn-default">back_to_list</a>
        </div>
    </div>
@stop