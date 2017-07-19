@extends('layouts.master')


@section('content')
    <h3 class="page-title">@lang('quickadmin.vacinecategory.title')</h3>

    <p>
        <a href="{{ route('vacinecategories.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($vacinecategories) > 0 ? 'datatable' : '' }} @can('vacinecategory_delete') dt-select @endcan">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>@lang('quickadmin.vacinecategory.fields.name')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($vacinecategories) > 0)
                        @foreach ($vacinecategories as $vacinecategory)
                            <tr data-entry-id="{{ $vacinecategory->id }}">

                                    <td></td>


                                <td>{{ $vacinecategory->name }}</td>
                                <td>

                                    <a href="{{ route('vacinecategories.show',[$vacinecategory->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>

                                    <a href="{{ route('vacinecategories.edit',[$vacinecategory->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>

                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['vacinecategories.destroy', $vacinecategory->id])) !!}
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

            window.route_mass_crud_entries_destroy = '{{ route('vacinecategories.mass_destroy') }}';


    </script>
@endsection