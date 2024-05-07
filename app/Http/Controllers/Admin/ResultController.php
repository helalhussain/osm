<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Result;
use App\Models\Classroom;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Result::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('admin.result.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Result $result)
    {
        $classes = Classroom::all();
        return view('admin.result.form',compact('classes'));
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
            $file = file_upload($request->file, 'result');
        }

        $store = new Result();
        $store->classroom_id = $request->class;
        // $store->teacher_id = auth()->user()->id;
        $store->title = $request->title;
        $store->description = $request->description;
        $store->file =  $file;
        $store->save();
        return response()->json([
            'message' => 'Result added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        $classes = Classroom::all();
        return view('admin.result.show',compact('result','classes'));
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
    public function destroy(Result $result)
    {
        $result->delete();
        return response([
            'message'=>'Result deleted succssful'
        ]);
    }
}
