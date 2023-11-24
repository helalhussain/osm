<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Cls;
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
        $clses = Cls::all();
        return view('administator.notice.form',compact('clses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $store = new Notice();
        $store->title = $request->title;
        $store->description = $request->description;
        $store->image = file_upload($request->image, 'notice');
        $store->save();
        return response()->json([
            'message' => 'Notice added successfully'
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
    public function edit(Notice $notice)
    {
        return view('administator.notice.form',compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required',

        ]);
        $notice->update([
                'title'=>$request->title,
                'description'=>$request->description
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
