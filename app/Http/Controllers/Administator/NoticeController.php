<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Classroom;
use App\Models\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Notice::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('administator.notice.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Notice $notice)
    {
        $classes = Classroom::all();
        return view('administator.notice.form',compact('classes'));
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

        if($request->file==null){
            $file = null;
        }else{
            $file = file_upload($request->file, 'notice');
        }

        $store = new Notice();
        $store->classroom_id = $request->class;
        $store->administator_id = auth()->user()->id;
        $store->user_type = "administator";
        $store->title = $request->title;
        $store->description = $request->description;
        $store->file =  $file;
        $store->save();
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
        return view('administator.notice.show',compact('notice','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        $classes =Classroom::all();
        return view('administator.notice.form',compact('notice','classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'class' => 'required',
            'title' => 'required',

        ]);
        if($request->file==null){
            $file = null;
        }else{
            $file = file_upload($request->file, 'notice');
        }
        $notice->update([
            'classroom_id'=>$request->class,
            'title'=>$request->title,
            'description'=>$request->description,
            'file'=>$file

    ]);
        return response()->json(['message' => 'Notice updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return response([
            'message'=>'Notice deleted succssful'
        ]);
    }
}
