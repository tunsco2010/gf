@extends('layouts.master')

@section('content')
    <h3 class="page-title">@lang('quickadmin.faq-categories.title')</h3>

    <p>
        <a href="{{ route('faq_categories.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($faq_categories) > 0 ? 'datatable' : '' }} @can('faq_category_delete') dt-select @endcan">
                <thead>
                    <tr>

                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>


                        <th>@lang('quickadmin.faq-categories.fields.title')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($faq_categories) > 0)
                        @foreach ($faq_categories as $faq_category)
                            <tr data-entry-id="{{ $faq_category->id }}">

                                    <td></td>


                                <td>{{ $faq_category->title }}</td>
                                <td>

                                    <a href="{{ route('faq_categories.show',[$faq_category->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>

                                    <a href="{{ route('faq_categories.edit',[$faq_category->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>

                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['faq_categories.destroy', $faq_category->id])) !!}
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
        @can('faq_category_delete')
            window.route_mass_crud_entries_destroy = '{{ route('faq_categories.mass_destroy') }}';
        @endcan

    </script>
@endsection