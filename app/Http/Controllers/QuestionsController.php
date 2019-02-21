<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionFormRequest;
use Illuminate\Http\Request;
use App\Question;
use App\Rubric;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request) {

        if(intval($request->rubric)) {
            $questions = Question::where('rubric', '=', $request->rubric)
                                 ->where('status', '=', '1')->get();
            $current_rubric = $request->rubric;
        } else {
            $questions = Question::where('status', '=', '1')->get();
        }
        $rubrics = Rubric::all();

        return view('questions.index', compact('questions', 'rubrics', 'current_rubric'));
    }

    public function admin() {
        $questions = Question::all();
        $rubrics = Rubric::all();
        $rubrics_ar = array();

        foreach($rubrics as $rub) {
            $rubrics_ar[$rub->id] = $rub->name;
        }

        return view('questions.admin', compact('questions', 'rubrics', 'rubrics_ar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rubrics = Rubric::all();
        return view('questions.create', compact('rubrics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() {

        request()->validate([
            "question" => "required|min:10"
        ]);

        Question::create(request(["rubric", "question"]));


        return redirect("/ask")->with("status", "Ваш вопрос отправлен");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {

        //$question = Question::whereId($id)->firstOrFail();
        $rubrics = Rubric::all();

        return view('questions.edit', compact('question', 'rubrics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question)
    {
        $question->update([
            "question" => request('question'),
            "answer" => request('answer'),
            "rubric" => request('rubric'),
            "status" => (request('status') != null)? 1 : 0
        ]);

        return redirect(action('QuestionsController@update', $question->id))->with('status', "Изменения сохранены");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
