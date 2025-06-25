<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Answer;
use App\Models\User;


class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'ans'=>'required',
        ]);
            $store = new Answer();
            $store->quiz_id = $request->quiz_id;
            $store->user_id = auth()->user()->id;
            $store->question_id =  $request->question_name;
            $store->type =  $request->type;
            $store->ans = $request->ans;
            $store->save();

            return redirect()->back();
        // return response()->json([
        //     'message' => 'Quiz answered successfully'
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {

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
