<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Teacher;
use App\Models\Subject;
use App\Notifications\TeacherNotification;
use Illuminate\Support\Facades\Notification;

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
        $teachers = Teacher::all();
        return view('administator.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Teacher $teacher)
    {
        $subjects = Subject::all();
        return view('administator.teacher.form',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required|unique:teachers',
            'subjects'=>'required',
            'password'=>'required|min:8|max:30',
            'password_confirmation'=>'required|same:password'

        ]);
        if($request->image==null){
            $store = new Teacher();
            $store->name = $request->name;
            $store->email = $request->email;
            $store->gender = $request->gender;
            $store->phone = $request->phone;
            $store->address = $request->address;
            $store->dob= $request->birthdate;
            $store->password = bcrypt($request->password);
            $store->save();
            $store->subjects()->sync($request->subjects);

        }else{

            $store = new Teacher();
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

        }
        $store->notify(new TeacherNotification($store->name,$store->email,$request->password));
        return response()->json([
            'message' => 'Teacher added successfully'
        ]);
        // return redirect()->route('administator.teacher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $subjects = Subject::all();
        return view('administator.teacher.show',compact('teacher','subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('administator.teacher.form',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        if($request->image==null){
            $store = Teacher::find($id);
            $store->name = $request->name;
            $store->email = $request->email;
            $store->gender = $request->gender;
            $store->phone = $request->phone;
            $store->address = $request->address;
            $store->dob= $request->date;
            $store->save();
            $store->subjects()->sync($request->subjects);

        }else{

            $store = Teacher::find($id);
            $store->name = $request->name;
            $store->email = $request->email;
            $store->gender = $request->gender;
            $store->phone = $request->phone;
            $store->address = $request->address;
            $store->dob= $request->date;
            $store->image = file_upload($request->image, 'teacher');
            $store->save();
            $store->subjects()->sync($request->subjects);

        }
        // return response()->json(['message' => 'Teacher updated successfully']);
        return redirect()->route('administator.teacher.index');
    }
    public function status(Request $request, Teacher $teacher)
    {

        $teacher->update([
            'status'=>false
        ]);
        return redirect()->route('administator.teacher.index');
    // return response()->json(['message' => 'Teacher status updated successfully']);

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
