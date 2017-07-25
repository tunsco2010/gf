@extends('layouts.master')

@section('content')
    <h3 class="page-title">@lang('quickadmin.income.title')</h3>

    <p>
        <a href="{{ route('incomes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($incomes) > 0 ? 'datatable' : '' }} dt-select ">
                <thead>
                    <tr>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>


                        <th>@lang('quickadmin.income.fields.income-category')</th>
                        <th>@lang('quickadmin.income.fields.entry-date')</th>
                        <th>@lang('quickadmin.income.fields.amount')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($incomes) > 0)
                        @foreach ($incomes as $income)
                            <tr data-entry-id="{{ $income->id }}">

                                    <td></td>


                                <td>{{ $income->income_category->name or '' }}</td>
                                <td>{{ $income->entry_date }}</td>
                                <td>{{ $income->amount }}</td>
                                <td>

                                    <a href="{{ route('incomes.show',[$income->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>

                                    <a href="{{ route('incomes.edit',[$income->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>

                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['incomes.destroy', $income->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
            window.route_mass_crud_entries_destroy = '{{ route('incomes.mass_destroy') }}';

    </script>
@endsection