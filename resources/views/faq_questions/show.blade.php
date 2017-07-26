@extends('layouts.master')

@section('content')
    <h3 class="page-title">@lang('quickadmin.faq-questions.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.faq-questions.fields.category')</th>
                            <td>{{ $faq_question->category->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.faq-questions.fields.question-text')</th>
                            <td>{!! $faq_question->question_text !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.faq-questions.fields.answer-text')</th>
                            <td>{!! $faq_question->answer_text !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('faq_questions.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop