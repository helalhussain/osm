<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::eloquent(Teacher::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('admin.teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Teacher $teacher)
    {
        $subjects = Subject::all();
        return view('admin.teacher.form',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required',
            'password'=>'required|min:8',
            'password_confirmation'=>'required|same:password'

        ]);

        $store = new Teacher();
        // $store->categories()->sync($request->category);
        // $stores->regions()->attach($regions);

        $store->name = $request->name;
        $store->email = $request->email;
        $store->gender = $request->gender;
        $store->phone = $request->phone;
        $store->address = $request->address;
        $store->dob= $request->date;
        $store->image = file_upload($request->image, 'teacher');
        $store->password = bcrypt($request->password);

        $store->save();
        $store->subjects()->sync($request->subjects);
        // $store->subjects()->attach($request->subject);
        return response()->json([
            'message' => 'Teacher added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('admin.teacher.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',

        ]);
        if($request->image==null){

        }else{
            $image = file_upload($request->image, 'teacher');
        }
        $teacher->update([
                'name'=>$request->name,
                'gender'=>$request->gender,
                'dob'=>$request->date,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'image'  => $image
        ]);
        return response()->json(['message' => 'Teacher updated successfully']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return response()->json([
            'message' => 'Teacher deleted successful'
        ]);
    }
}
