<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Classroom;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\Facades\DataTables;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (request()->ajax()) {
        //     return DataTables::eloquent(Answer::query()->select('id','title')->where('teacher_id','=',auth()->user()->id))
        //         ->addIndexColumn()
        //         ->addColumn('action', fn () => '')
        //         ->toJson();
        // }
        $quizzes = Quiz::orderBy('id', 'DESC')->get();
        return view('teacher.answer.index',compact('quizzes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show_quiz(Answer $answer, $id)
    {

        $quiz = Quiz::find($id);
        $questions = Question::all();
        // $answer = Answer::Where('quiz_id','=',$quiz->id)->get();
        $ans = Answer::all();

        $answers = Answer::join('questions','questions.id','=','answers.question_id')
        ->join('users','users.id','=','answers.user_id')
        ->get(['answers.quiz_id','answers.ans','questions.question','questions.mark','users.name','users.email']);

        // $question = Answer::join('questions','questions.id','=','answers.question_id')
        // ->join('users','users.id','=','answers.user_id')
        // ->get(['answers.ans','questions.question','users.name','users.email']);


        // $users = User::Where('id','=','')->get();
        $users = User::all();

        return view('teacher.answer.show',compact('answers','ans','questions','quiz','users'));
    }
    public function show_result(Answer $answer, $id)
    {


    }
    public function show(Answer $answer)
    {
        $users = User::all();
        $quizzes = Quiz::all();
        $questions = Question::all();
        $answers = Answer::all();
        // $answers = Answer::groupBy('user_id')->get();
        return view('teacher.answer.show',compact('answers','answer','questions','quizzes','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
