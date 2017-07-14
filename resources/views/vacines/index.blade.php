@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.vacine.title')</h3>
    @can('vacine_create')
    <p>
        <a href="{{ route('admin.vacines.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($vacines) > 0 ? 'datatable' : '' }} @can('vacine_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('vacine_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.vacine.fields.name')</th>
                        <th>@lang('quickadmin.vacine.fields.interval')</th>
                        <th>@lang('quickadmin.vacine.fields.description')</th>
                        <th>@lang('quickadmin.vacine.fields.last-vacine-date')</th>
                        <th>@lang('quickadmin.vacine.fields.next-vacine-date')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($vacines) > 0)
                        @foreach ($vacines as $vacine)
                            <tr data-entry-id="{{ $vacine->id }}">
                                @can('vacine_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $vacine->name }}</td>
                                <td>{{ $vacine->interval }}</td>
                                <td>{{ $vacine->description }}</td>
                                <td>{{ $vacine->last_vacine_date }}</td>
                                <td>{{ $vacine->next_vacine_date }}</td>
                                <td>
                                    @can('vacine_view')
                                    <a href="{{ route('admin.vacines.show',[$vacine->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('vacine_edit')
                                    <a href="{{ route('admin.vacines.edit',[$vacine->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('vacine_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.vacines.destroy', $vacine->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('vacine_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.vacines.mass_destroy') }}';
        @endcan

    </script>
@endsection