<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Question;

use Yajra\DataTables\Facades\DataTables;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Quiz::query()->select('id','title')->where('teacher_id','=',auth()->user()->id))
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
        $classes = Classroom::all();
        $courses = Course::all();
        return view('teacher.quiz.form',compact('classes','courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'class' => 'required',
            // 'title' => 'required',

        ]);
            $store = new Quiz();
            // $store->classroom_id = $request->class;
            $store->course_id = $request->course;
            $store->teacher_id = auth()->user()->id;
            $store->title =  $request->title;
            $store->minute =  $request->time;
            // $store->a = $request->a;
            // $store->b = $request->b;
            // $store->c = $request->c;
            // $store->d = $request->d;
            // $store->ans = $request->ans;
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
        $classrooms = Classroom::all();
        $courses = Course::all();
        $subjects = Subject::all();
        $questions = Question::Where('quiz_id','=',$quiz->id)
        ->Where('teacher_id','=',auth()->user()->id)->paginate(30);
        return view('teacher.quiz.show',compact('quiz','classrooms','courses','subjects','questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {

        $classrooms = Classroom::all();
        $courses = Course::all();

        return view('teacher.quiz.form',compact('quiz','classrooms','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {

        $request->validate([
            'course' => 'required',
            'title' => 'required',

        ]);

            $quiz->update([
                'course_id'=>$request->course,
                'title'=>$request->title,
                'minute'=>$request->time,

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
