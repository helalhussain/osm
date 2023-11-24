<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Section;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Subject;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Courses = Course::all();
        return view('administator.cls.section.course',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('administator.cls.section.course.form',compact('subjects','groups','teachers'));
    }
    // public function create()
    // {
    //     return view('administator.cls.form');
    // }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

        ]);
        $store = new Course();
        $store->cls_id = 1;
        $store->group_id = 1;
        $store->section_id= 1;
        $store->subject_id= $request->subject;
        $store->teacher_id= $request->teacher;
        $store->title = $request->subject;
        $store->save();
        return redirect()->back();
    //     // return response()->json([
    //     //     'message' => 'Class group added successfully'
    //     // ]);
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
    public function destroy(Course $course)
    {
        $course->delete();
        return response([
            'message'=>'Course deleted succssful'
        ]);
    }
}
