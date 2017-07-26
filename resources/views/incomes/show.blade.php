@extends('layouts.master')

@section('content')
    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'><a href='/incomes'>Income</a></li>
    </ol>

    <h2 class="page-title">@lang('quickadmin.income.title')</h2>

    <hr/>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.income.fields.income-category')</th>
                            <td>{{ $income->income_category->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.income.fields.entry-date')</th>
                            <td>{{ $income->entry_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.income.fields.amount')</th>
                            <td>{{ $income->amount }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('incomes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop