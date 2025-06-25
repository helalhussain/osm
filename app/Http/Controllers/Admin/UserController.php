<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Payment;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(User::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('admin.student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $payments = Payment::all();
        return view('admin.student.show',compact('user','payments'));
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
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',

        ]);
        if($request->image==null){
            $user->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'gender'=>$request->gender,
                'dob'=>$request->date,
                'address'=>$request->address,
                'in_active'=>$request->in_active,
        ]);
        }else{
            $user->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'gender'=>$request->gender,
                'dob'=>$request->date,
                'address'=>$request->address,
                'in_active'=>$request->in_active,
                'image' => file_upload($request->image, 'user'),
        ]);

        }



        return response()->json(['message' => 'Student updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'Student deleted successful'
        ]);
    }
}
