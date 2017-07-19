@extends('layouts.master')

@section('content')
    <h3 class="page-title">@lang('quickadmin.time-projects.title')</h3>
    @can('time_project_create')
    <p>
        <a href="{{ route('time_projects.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($time_projects) > 0 ? 'datatable' : '' }}  dt-select">
                <thead>
                    <tr>

                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>


                        <th>@lang('quickadmin.time-projects.fields.name')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($time_projects) > 0)
                        @foreach ($time_projects as $time_project)
                            <tr data-entry-id="{{ $time_project->id }}">

                                    <td></td>


                                <td>{{ $time_project->name }}</td>
                                <td>

                                    <a href="{{ route('time_projects.show',[$time_project->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>

                                    <a href="{{ route('time_projects.edit',[$time_project->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>

                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['time_projects.destroy', $time_project->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>

            window.route_mass_crud_entries_destroy = '{{ route('time_projects.mass_destroy') }}';


    </script>
@endsection