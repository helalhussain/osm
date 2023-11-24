<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Size::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('admin.size.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.product.create_size');
        return view('admin.size.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:colors|max:150',
        ]);
        $store = new Size();
        $store->name = $request->name;
        $store->slug = generate_slug($request->name);
        $store->save();
        return response()->json([
            'message' => 'Size added successfully'
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
    public function edit(Size $size)
    {


        return view('admin.size.form',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {

        $request->validate([
            'name' => 'required|max:150',
        ]);
        $size->update([
                'name'=>$request->name,
                'slut'=>generate_slug($request->name)
        ]);
        return response()->json(['message' => 'Size updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return response()->json([
            'message'=>'Size deleted successfylly'
        ]);
    }



}
