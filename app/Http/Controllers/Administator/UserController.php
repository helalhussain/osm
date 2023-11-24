<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Cls;

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
        return view('administator.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        // $clses = Cls::all();

        $subjects = Subject::all();
        return view('administator.student.form',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email'=>'required',
            'password'=>'required|min:8',
            'password_confirmation'=>'required|same:password'

        ]);

        $store = new User();
        $store->student_id = $request->id;
        $store->name = $request->name;
        $store->cls_id = $request->class;
        $store->email = $request->email;
        $store->phone = $request->phone;
        $store->gender = $request->gender;
        $store->dob= $request->date;
        $store->address = $request->address;
        $store->password = bcrypt($request->password);
        $store->image = file_upload($request->image, 'student');
        $store->save();
        return response()->json([
            'message' => 'Student added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('administator.user.show',compact('user'));
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
