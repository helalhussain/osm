<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Classroom;

use Yajra\DataTables\Facades\DataTables;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Notice::query()->select('id','title','description')->where('teacher_id','=',auth()->user()->id))
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('teacher.notice.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Notice $notice)
    {
        $classrooms = Classroom::all();
        return view('teacher.notice.form',compact('classrooms'));
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

        if($request->file == null){
            $store = new Notice();
            $store->classroom_id = $request->class;
            $store->teacher_id = auth()->user()->id;
            $store->user_type = "teacher";
            $store->title = $request->title;
            $store->description = $request->description;
            // $store->dateline = $request->dateline;
            $store->save();
        }else{
            $store = new Notice();
            $store->classroom_id = $request->class;
            $store->teacher_id = auth()->user()->id;
            $store->user_type = "teacher";
            $store->title = $request->title;
            $store->description = $request->description;
            $store->file =  file_upload($request->file, 'notice');;
            $store->save();

        }


        return response()->json([
            'message' => 'Notice added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        $classes = Classroom::all();
        return view('teacher.notice.show',compact('notice','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        $classrooms = Classroom::all();
        return view('teacher.notice.form',compact('notice','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request,Notice $notice)
    {

        $request->validate([
            'class' => 'required',
            'title' => 'required',

        ]);
        if($request->file==null){
            $notice->update([
                'classroom_id'=>$request->class,
                'title'=>$request->title,
                'description'=>$request->description,

            ]);
        }else{
            $notice->update([
                'classroom_id'=>$request->class,
                'title'=>$request->title,
                'description'=>$request->description,
                'file'=>file_upload($request->file, 'notice')

            ]);
        }

        return response()->json(['message' => 'Notice updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return response()->json([
            'message'=>'Notice deleted successfylly'
        ]);
    }
}
