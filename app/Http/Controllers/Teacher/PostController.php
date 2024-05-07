<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Course;

use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Post::query()->select('id','title','description')->where('teacher_id','=',auth()->user()->id))
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('teacher.post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        $courses = Course::all();
        return view('teacher.post.form',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'course' => 'required',
        ]);
        if($request->file==null){
            $file = null;
        }else{
            $file = file_upload($request->file, 'post');
        }
        $store = new Post();
        $store->course_id = $request->course;
        $store->teacher_id = auth()->user()->id;
        $store->title = $request->title;
        $store->description = $request->description;
        $store->file = $file;
        $store->save();
        return response()->json([
            'message' => 'Post added successfully'
        ]);
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
    public function edit(Post $post)
    {
        $courses = Course::all();

        return view('teacher.post.form',compact('post','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:150',
            'course' => 'required',
        ]);
        if($request->file==null){
            $file = null;
        }else{
            $file = file_upload($request->file, 'post');
        }
        $post->update([
                'course_id' => $request->course,
                'title'=>$request->title,
                'description'=>$request->description,
                'file'=> $file,

        ]);
        return response()->json(['message' => 'Notice updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message'=>'Post deleted successfylly'
        ]);
    }
}
