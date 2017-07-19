@extends('layouts.master')

@section('content')
    <h3 class="page-title">@lang('quickadmin.time-entries.title')</h3>

    <p>
        <a href="{{ route('time_entries.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($time_entries) > 0 ? 'datatable' : '' }}  dt-select ">
                <thead>
                    <tr>

                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>


                        <th>@lang('quickadmin.time-entries.fields.work-type')</th>
                        <th>@lang('quickadmin.time-entries.fields.project')</th>
                        <th>@lang('quickadmin.time-entries.fields.start-time')</th>
                        <th>@lang('quickadmin.time-entries.fields.end-time')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($time_entries) > 0)
                        @foreach ($time_entries as $time_entry)
                            <tr data-entry-id="{{ $time_entry->id }}">

                                    <td></td>


                                <td>{{ $time_entry->work_type->name or '' }}</td>
                                <td>{{ $time_entry->project->name or '' }}</td>
                                <td>{{ $time_entry->start_time }}</td>
                                <td>{{ $time_entry->end_time }}</td>
                                <td>

                                    <a href="{{ route('time_entries.show',[$time_entry->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>

                                    <a href="{{ route('time_entries.edit',[$time_entry->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>

                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['time_entries.destroy', $time_entry->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>

            window.route_mass_crud_entries_destroy = '{{ route('time_entries.mass_destroy') }}';


    </script>
@endsection