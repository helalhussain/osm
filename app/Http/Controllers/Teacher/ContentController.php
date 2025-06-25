<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Content;
use App\Models\Classroom;
use App\Models\Subject;
use Yajra\DataTables\Facades\DataTables;


class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Content::query()->select('id','title','subject','description')->where('teacher_id','=',auth()->user()->id))
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('teacher.content.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    // $query = Student::query();
    //     if($request->ajax()){
    //        $students = $query->where('name','LIKE','%'.$request->name.'%')->get();
    //     // $sutends = Student::white('id',5)->get();
    //         return response()->json(['students'=>$students]);
    //     }else{
    //         $students = $query->get();
    //         return view('student.index',compact('students'));
    // $query->where(['category_id'=>$request->category])->get()
    //     }
    public function create(Request $request)
    {
        $query = Subject::query();
        if($request->ajax()){
            // $subjects = $query->where(['classroom_id'=>$request->class])->get();
            $subjects = $query->get();
            return response()->json(['subjects'=>$subjects]);
        }else{
            $courses = Course::all();
            $classrooms = Classroom::all();
            $subjects = Subject::all();
            return view('teacher.content.form',compact('classrooms','courses','subjects'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Content $content)
    {
        $request->validate([

            'title' => 'required',
        ]);

        if($request->file==null){
            $store = new Content();
            $store->subject = $request->subject;
            $store->teacher_id = auth()->user()->id;
            $store->title = $request->title;
            $store->description = $request->description;
            $store->save();
        }else{
            $store = new Content();
            $store->subject = $request->subject;
            $store->teacher_id = auth()->user()->id;
            $store->title = $request->title;
            $store->description = $request->description;
            $store->file = file_upload($request->file, 'content');
            $store->save();

        }
        return redirect()->route('teacher.content.index')->with('success','Success');
        // return response()->json([
        //     'message' => 'Content added successfully'
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {

        $subjects = Subject::all();
        return view('teacher.content.show',compact('content','subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        return view('teacher.content.edit',compact('content','classrooms','subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Content $content)
    {

        $request->validate([
            // 'class' => 'required',
            'title' => 'required|max:150',
        ]);
        if($request->file==null){
            $content->update([
                'subject'=>$request->subject,
                'title'=>$request->title,
                'description'=>$request->description,

        ]);
        }else{
            $content->update([
                // 'classroom_id'=>$request->class,
                'subject'=>$request->subject,
                'title'=>$request->title,
                'description'=>$request->description,
                'file'=>file_upload($request->file, 'content')
        ]);
        }

        return redirect()->route('teacher.content.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return response([
            'message' => 'Content deleded successfully'
        ]);
    }
}
