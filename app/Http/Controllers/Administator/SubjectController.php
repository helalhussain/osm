<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Classroom;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Subject::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
       return view('administator.subject.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Subject $subject)
    {
        $classrooms = Classroom::all();
        return view('administator.subject.form',compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subjects',

        ]);


        $store = new Subject();
        $store->name = $request->name;
        $store->slug = generate_slug($request->name);
        // $store->fee = $request->fee;
        // $store->discount = $request->discount;
        $store->save();
        return response()->json([
            'message' => 'Subject added successfully'
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
    public function edit(Subject $subject)
    {
        $classrooms = Classroom::all();
        return view('administator.subject.form',compact('subject','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {

        $request->validate([
            'name' => 'required',
        ]);
        $subject->update([
                'name'=>$request->name,
                'slug'=>generate_slug($request->name),
                // 'fee'=>$request->fee,
                // 'discount'=>$request->discount
        ]);
        return response()->json(['message' => 'Subject updated successfully']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response()->json([
            'message' => 'Subject deleted successful'
        ]);

    }
}
