@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.faq-questions.title')</h3>
    @can('faq_question_create')
    <p>
        <a href="{{ route('admin.faq_questions.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($faq_questions) > 0 ? 'datatable' : '' }} @can('faq_question_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('faq_question_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.faq-questions.fields.category')</th>
                        <th>@lang('quickadmin.faq-questions.fields.question-text')</th>
                        <th>@lang('quickadmin.faq-questions.fields.answer-text')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($faq_questions) > 0)
                        @foreach ($faq_questions as $faq_question)
                            <tr data-entry-id="{{ $faq_question->id }}">
                                @can('faq_question_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $faq_question->category->title or '' }}</td>
                                <td>{!! $faq_question->question_text !!}</td>
                                <td>{!! $faq_question->answer_text !!}</td>
                                <td>
                                    @can('faq_question_view')
                                    <a href="{{ route('admin.faq_questions.show',[$faq_question->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('faq_question_edit')
                                    <a href="{{ route('admin.faq_questions.edit',[$faq_question->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('faq_question_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.faq_questions.destroy', $faq_question->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
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
        @can('faq_question_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.faq_questions.mass_destroy') }}';
        @endcan

    </script>
@endsection