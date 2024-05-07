<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Section;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Classroom;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $courses = Course::all();
        // return view('administator.cls.section.course',compact('courses'));
        if (request()->ajax()) {
            return DataTables::eloquent(Course::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }

        return view('administator.course.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $teachers = Teacher::all();
        $sections = Section::all();
        $subjects = Subject::all();
        $classes = Classroom::all();
        return view('administator.course.form',compact('subjects','sections','teachers','classes'));
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
        $store->classroom_id = $request->class;
        $store->section_id= $request->section;
        $store->title= $request->title;
        $store->subject_id= 1;
        $store->teacher_id= 1;
        $store->save();
        $store->subjects()->sync($request->subjects);
        return response()->json([
            'message' => 'Course added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $classes = Classroom::all();
        return view('administator.course.show',compact('course','classes'));
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
