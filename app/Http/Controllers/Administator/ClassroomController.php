<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Classroom;
use App\Models\Section;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Classroom::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }


        return view('administator.classroom.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administator.classroom.form');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
// dd($request->all());
        $store = new Classroom();
        $store->title = $request->title;
        $store->save();
        return response()->json([
            'message' => 'Class added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
       return view('administator.classroom.show',compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        return view('administator.classroom.form',compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'title' => 'required|max:150',
        ]);
        $classroom->update([
                'title'=>$request->title,
        ]);
        return response()->json(['message' => 'Class updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return response([
            'message'=>'Class deleted succssful'
        ]);
    }
}
