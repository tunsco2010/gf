@extends('layouts.master')

@section('content')
    <h3 class="page-title">@lang('quickadmin.vacine.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.vacine.fields.name')</th>
                            <td>{{ $vacine->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vacine.fields.interval')</th>
                            <td>{{ $vacine->interval }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vacine.fields.description')</th>
                            <td>{{ $vacine->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vacine.fields.last-vacine-date')</th>
                            <td>{{ $vacine->last_vacine_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.vacine.fields.next-vacine-date')</th>
                            <td>{{ $vacine->next_vacine_date }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('vacines.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop