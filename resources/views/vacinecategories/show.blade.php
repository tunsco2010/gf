@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.vacinecategory.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.vacinecategory.fields.name')</th>
                            <td>{{ $vacinecategory->name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#vacine" aria-controls="vacine" role="tab" data-toggle="tab">Vacine</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="vacine">
<table class="table table-bordered table-striped {{ count($vacines) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.vacinecategories.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop