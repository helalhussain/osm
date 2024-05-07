<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Classroom;
use App\Models\Teacher;

use Yajra\DataTables\Facades\DataTables;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Quiz::query()->select('id','title','quiz','description')->where('teacher_id','=',auth()->user()->id))
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('teacher.quiz.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Quiz $quiz)
    {
        $classrooms = Classroom::all();
        return view('teacher.quiz.form',compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'title' => 'required',

        ]);
            $store = new Quiz();
            $store->classroom_id = $request->class;
            $store->teacher_id = auth()->user()->id;
            $store->title = $request->title;
            $store->description = $request->description;
            $store->quiz = $request->quiz;
            // $store->file =  file_upload($request->file, 'quiz');;
            $store->save();

        return response()->json([
            'message' => 'Quiz added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        $classes = Classroom::all();
        return view('teacher.quiz.show',compact('quiz','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        $classrooms = Classroom::all();
        return view('teacher.quiz.form',compact('quiz','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {

        $request->validate([
            'class' => 'required',
            'title' => 'required',

        ]);

            $quiz->update([
                'classroom_id'=>$request->class,
                'title'=>$request->title,
                'description'=>$request->description,
                'quiz'=>$request->quiz,

            ]);


        return response()->json(['message' => 'Quiz updated successfully']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return response()->json([
            'message'=>'Quiz deleted successfylly'
        ]);
    }
}
