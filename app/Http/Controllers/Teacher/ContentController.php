<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Yajra\DataTables\Facades\DataTables;


class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Content::query())
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
        return view('teacher.content.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Content $content)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $store = new Content();
        $store->title = $request->title;
        $store->description = $request->description;
        $store->save();
        return response()->json([
            'message' => 'Content added successfully'
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
    public function edit(Content $content)
    {
        return view('teacher.content.form',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Content $content)
    {

        $request->validate([
            'title' => 'required|max:150',
        ]);
        $content->update([
                'title'=>$request->title,
                'description'=>$request->description
        ]);
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
