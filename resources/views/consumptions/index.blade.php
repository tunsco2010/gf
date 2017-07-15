@extends('layouts.master')

@section('content')
    <h3 class="page-title">Feeds Consumption</h3>

    <p>
        <a href="{{ url('health/consumptions/create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
       <div class="panel panel-default">
        <div class="panel-heading">
           Collection List
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($consumptions) > 0 ? 'datatable' : '' }} @can('consumption_delete') dt-select @endcan">
                <thead>
                    <tr>

                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>@lang('quickadmin.consumption.fields.user')</th>
                        <th>@lang('quickadmin.consumption.fields.quantity')</th>
                        <th>@lang('quickadmin.consumption.fields.date')</th>
                        <th>@lang('quickadmin.consumption.fields.description')</th>
                        <th>@lang('quickadmin.consumption.fields.stock')</th>
                        <th> Tools</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($consumptions) > 0)
                        @foreach ($consumptions as $consumption)
                            <tr data-entry-id="{{ $consumption->id }}">
                                <td></td>
                                <td>{{ $consumption->user->name or '' }}</td>
                                <td>{{ $consumption->quantity }}</td>
                                <td>{{ $consumption->date }}</td>
                                <td>{{ $consumption->description }}</td>
                                <td>{{ $consumption->stock->quantity or '' }}</td>
                                <td>
                                    <a href="{{ url('health/consumptions.show',[$consumption->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>

                                    <a href="{{ url('health/consumptions.edit',[$consumption->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>

                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'url' => ['health/consumptions/destroy', $consumption->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}

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
            window.route_mass_crud_entries_destroy
                = '{{ url('health/consumptions.mass_destroy') }}';
    </script>
@endsection