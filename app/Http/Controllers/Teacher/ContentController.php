<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Content;
use App\Models\Classroom;
use Yajra\DataTables\Facades\DataTables;


class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Content::query()->select('id','title','description')->where('teacher_id','=',auth()->user()->id))
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('teacher.content.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Content $content)
    {
        $classrooms = Classroom::all();
        return view('teacher.content.form',compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Content $content)
    {
        $request->validate([
            'class' => 'required',
            'title' => 'required',
        ]);

        if($request->file==null){
            $store = new Content();
            $store->classroom_id = $request->class;
            $store->teacher_id = auth()->user()->id;
            $store->title = $request->title;
            $store->description = $request->description;
            $store->save();
        }else{
            $store = new Content();
            $store->classroom_id = $request->class;
            $store->teacher_id = auth()->user()->id;
            $store->title = $request->title;
            $store->description = $request->description;
            $store->file = file_upload($request->file, 'content');
            $store->save();

        }

        return response()->json([
            'message' => 'Content added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        $classes = Classroom::all();
        return view('teacher.content.show',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        $classrooms = Classroom::all();
        return view('teacher.content.form',compact('content','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Content $content)
    {

        $request->validate([
            'class' => 'required',
            'title' => 'required|max:150',
        ]);
        if($request->file==null){
            $content->update([
                'classroom_id'=>$request->class,
                'title'=>$request->title,
                'description'=>$request->description,
                
        ]);
        }else{
            $content->update([
                'classroom_id'=>$request->class,
                'title'=>$request->title,
                'description'=>$request->description,
                'file'=>file_upload($request->file, 'content')
        ]);
        }

        return response()->json(['message' => 'Content updated successfully']);
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
