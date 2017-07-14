@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.consumption.title')</h3>
    @can('consumption_create')
    <p>
        <a href="{{ route('admin.consumptions.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($consumptions) > 0 ? 'datatable' : '' }} @can('consumption_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('consumption_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('consumption_delete')
                                    <td></td>
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('consumption_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.consumptions.mass_destroy') }}';
        @endcan

    </script>
@endsection