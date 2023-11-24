<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class AdministatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          if (request()->ajax()) {
            return DataTables::eloquent(Administator::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('admin.administator.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Administator $administator)
    {
        return view('admin.administator.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:administators',
            'password' =>'required|min:8',
            'password_confirmation' => 'same:password'
        ]);

        $store = new Administator();
        $store->name = $request->name;
        $store->email = $request->email;
        $store->password = bcrypt($request->password);
        $store->save();
        return response()->json([
            'message' => 'Administator added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administator $administator)
    {
        return view('admin.administator.form',compact('administator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administator $administator)
    {
        $request->validate([
            'name' => 'required',
            'email' =>'required|email',

        ]);
        $administator->update([
                'name'=>$request->name,
                'email'=>$request->email,
        ]);
        return response()->json(['message' => 'Administator updated successfully']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administator $administator)
    {
        $administator->delete();
        return response()->json([
            'message' => 'Administator deleted successful'
        ]);
    }
}
