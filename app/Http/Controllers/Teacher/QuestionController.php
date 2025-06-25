<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Question;
use Yajra\DataTables\Facades\DataTables;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Question::query()->select('id','type','question')->where('teacher_id','=',auth()->user()->id))
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('teacher.question.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create_question(Quiz $quiz,$quiz_id){
        $quiz = Quiz::find($quiz_id);
        return view('teacher.quiz.add_question',compact('quiz'));
    }

    public function create_mcq($quiz_id){
        $quiz = Quiz::find($quiz_id);
        return view('teacher.quiz.add_mcq',compact('quiz'));

    }
    public function create()
    {
        $quizes = Quiz::all();
        return view('teacher.question.add_question',compact('quizes'));

    }

    /**
     * Store a newly created resource in storage.
     */

    //  public function add_question($quiz_id){
    //     $quiz = Quiz::find($quiz_id);
    //     return view('teacher.quiz.add_question',compact('quiz'));

    //  }
    public function store(Request $request)
    {

// dd($request->all());
        if($request->type == 'mcq'){

            if($request->image==null){
                $img = null;
            }else{
                $img = file_upload($request->image, 'question');
            }


            $store = new Question();
            $store->teacher_id = auth()->user()->id;
            // $store->course_id = $request->course;
            $store->quiz_id =  $request->quiz_id;

            if($request->image_A != null){
                $store->type =  "mcq_image";
            }else{
                $store->type =  $request->type;
            }
            $store->question = $request->question;



            if($request->image_A != null){
                $store->image_title_a = $request->title_A;
                $store->image_title_b = $request->title_B;
                $store->image_title_c = $request->title_C;
                $store->image_title_d = $request->title_D;

                $store->a = file_upload($request->image_A, 'question');
                $store->b = file_upload($request->image_B, 'question');
                $store->c = file_upload($request->image_C, 'question');
                $store->d = file_upload($request->image_D, 'question');
            }
            else{
                $store->a = $request->a;
                $store->b = $request->b;
                $store->c = $request->c;
                $store->d = $request->d;
            }


            $store->ans = $request->answer;
            $store->file = $img;
            $store->mark = $request->mark;
            $store->save();

        }


        else{
            // if($request->image==null){
            //     $img = null;
            // }else{
            //     $img = file_upload($request->image, 'question');
            // }
            $store = new Question();
            $store->teacher_id = auth()->user()->id;
            // $store->course_id = $request->course;
            $store->quiz_id =  $request->quiz_id;
            $store->type =  $request->type;
            $store->question =  $request->question;
            // $store->a = 'Null data';
            // $store->b = 'Null data';
            // $store->c = 'Null data';
            // $store->d = 'Null data';
            $store->ans = $request->answer;
            // $store->file = $img;
            $store->mark = $request->mark;
            $store->save();

        }


        // return response()->json([
        //     'message' => 'Question added successfully'
        // ]);
        // return redirect(url()->previous());
        // {{ route('teacher.create_question',$quiz->id) }}
        return redirect()->route('teacher.quiz.show',$request->quiz_id)->with('success','Success');
        // return redirect()->route('teacher.content.index')->with('success','Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Question $question)
    {
        $question->delete();
        return response([
            'message'=>'Question deleted succssful'
        ]);
    }
}
