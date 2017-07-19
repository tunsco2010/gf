<?php

namespace App\Http\Controllers;

use App\FaqQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFaqQuestionsRequest;
use App\Http\Requests\Admin\UpdateFaqQuestionsRequest;

class FaqQuestionsController extends Controller
{
    /**
     * Display a listing of FaqQuestion.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $faq_questions = FaqQuestion::all();

        return view('faq_questions.index', compact('faq_questions'));
    }

    /**
     * Show the form for creating new FaqQuestion.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = \App\FaqCategory::get()->pluck('title', 'id')->prepend('Please select', '');

        return view('faq_questions.create', compact('categories'));
    }

    /**
     * Store a newly created FaqQuestion in storage.
     *
     * @param  StoreFaqQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqQuestionsRequest $request)
    {

        $faq_question = FaqQuestion::create($request->all());



        return redirect()->route('faq_questions.index');
    }


    /**
     * Show the form for editing FaqQuestion.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = \App\FaqCategory::get()->pluck('title', 'id')->prepend('Please select', '');

        $faq_question = FaqQuestion::findOrFail($id);

        return view('faq_questions.edit', compact('faq_question', 'categories'));
    }

    /**
     * Update FaqQuestion in storage.
     *
     * UpdateFaqQuestionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqQuestionsRequest $request, $id)
    {
        if (! Gate::allows('faq_question_edit')) {
            return abort(401);
        }
        $faq_question = FaqQuestion::findOrFail($id);
        $faq_question->update($request->all());



        return redirect()->route('faq_questions.index');
    }


    /**
     * Display FaqQuestion.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $faq_question = FaqQuestion::findOrFail($id);

        return view('faq_questions.show', compact('faq_question'));
    }


    /**
     * Remove FaqQuestion from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $faq_question = FaqQuestion::findOrFail($id);
        $faq_question->delete();

        return redirect()->route('faq_questions.index');
    }

    /**
     * Delete all selected FaqQuestion at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = FaqQuestion::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
