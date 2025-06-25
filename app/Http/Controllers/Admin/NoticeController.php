<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Notice;
use Yajra\DataTables\Facades\DataTables;


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
        return view('admin.notice.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Notice $notice)
    {
        $classes = Classroom::all();
        return view('admin.notice.form',compact('classes'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'class' => 'required',
            'title' => 'required',
            // 'description'=>'max:2048'
        ]);

        if($request->file==null){
            $file = null;
        }else{
            $file = file_upload($request->file, 'notice');
        }

        $store = new Notice();
        $store->classroom_id = $request->class;
        $store->admin_id = auth()->user()->id;
        $store->user_type = "admin";
        $store->title = $request->title;
        $store->description = $request->description;
        $store->file =  $file;
        $store->save();

        return redirect()->route('admin.notice.index')->with('success','Success');
        // return response()->json([
        //     'message' => 'Notice added successfully'
        // ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        $classes = Classroom::all();
        return view('admin.notice.show',compact('notice','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        $classes = Classroom::all();
        return view('admin.notice.edit',compact('notice','classes'));
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
        return redirect()->route('admin.notice.index');
        // return response()->json(['message' => 'Notice updated successfully']);
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
