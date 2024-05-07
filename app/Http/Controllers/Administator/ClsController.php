<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Section;

class ClsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Cls::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }


        return view('administator.cls.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administator.cls.form');
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
        $store = new Cls();
        $store->title = $request->title;
        $store->save();
        return response()->json([
            'message' => 'Class added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cls $class)
    {


        $sections = Section::where('cls_id',$class->id)->get();
        return view('administator.cls.show',compact('sections'));

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
    public function destroy(Cls $cls)
    {
        $cls->delete();
        return response([
            'message'=>'Course deleted succssful'
        ]);
    }
}
