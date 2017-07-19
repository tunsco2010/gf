@extends('layouts.master')

@section('content')
    <h3 class="page-title">@lang('quickadmin.expense-category.title')</h3>

    <p>
        <a href="{{ route('expense_categories.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($expense_categories) > 0 ? 'datatable' : '' }} dt-select ">
                <thead>
                    <tr>

                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>


                        <th>@lang('quickadmin.expense-category.fields.name')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($expense_categories) > 0)
                        @foreach ($expense_categories as $expense_category)
                            <tr data-entry-id="{{ $expense_category->id }}">

                                    <td></td>


                                <td>{{ $expense_category->name }}</td>
                                <td>

                                    <a href="{{ route('expense_categories.show',[$expense_category->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>


                                    <a href="{{ route('expense_categories.edit',[$expense_category->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>

                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickqa_are_you_sure")."');",
                                        'route' => ['expense_categories.destroy', $expense_category->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickqa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>

            window.route_mass_crud_entries_destroy = '{{ route('expense_categories.mass_destroy') }}';


    </script>
@endsection