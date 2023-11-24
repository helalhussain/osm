<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Group;
use App\Models\Section;
use App\Models\Course;
use App\Models\Cls;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Section::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        $sections = Section::all();
        return view('administator.cls.index',compact('sections'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Section $section)
    {
        $groups = Group::all();
        $clses = Cls::all();
        return view('administator.cls.section.form',compact('groups','clses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

        ]);
        $store = new Section();
        $store->cls_id = $request->class;
        $store->group_id = $request->group;
        // $store->title = $request->title;
        $store->save();
        return response()->json([
            'message' => 'Class group added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sections = Section::all();
        $courses= Course::all();
        return view('administator.cls.section.show',compact('courses','sections'));
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
    public function destroy(string $id)
    {
        //
    }
}
