@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.vacinecategory.title')</h3>
    @can('vacinecategory_create')
    <p>
        <a href="{{ route('admin.vacinecategories.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($vacinecategories) > 0 ? 'datatable' : '' }} @can('vacinecategory_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('vacinecategory_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.vacinecategory.fields.name')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($vacinecategories) > 0)
                        @foreach ($vacinecategories as $vacinecategory)
                            <tr data-entry-id="{{ $vacinecategory->id }}">
                                @can('vacinecategory_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $vacinecategory->name }}</td>
                                <td>
                                    @can('vacinecategory_view')
                                    <a href="{{ route('admin.vacinecategories.show',[$vacinecategory->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('vacinecategory_edit')
                                    <a href="{{ route('admin.vacinecategories.edit',[$vacinecategory->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('vacinecategory_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.vacinecategories.destroy', $vacinecategory->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
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
        @can('vacinecategory_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.vacinecategories.mass_destroy') }}';
        @endcan

    </script>
@endsection