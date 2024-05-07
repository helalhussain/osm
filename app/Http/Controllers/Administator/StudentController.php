<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\User;

class StudentController extends Controller
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
        return view('administator.student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Student $student)
    {
        return view('administator.student.form');
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
    public function show(Student $student)
    {
        return view('administator.student.show',compact('student'));
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
        $request->validate([
            'name' => 'required',

        ]);
        // dd($request->all());
        $user->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'gender'=>$request->gender,
                'dob'=>$request->date,
                'address'=>$request->address
        ]);
        return response()->json(['message' => 'Student updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            'message' => 'Student deleted successful'
        ]);
    }
    public function inActive(Request $request)
    {
        dd($request->all());
        if($request->in_active_value == 0){
            Student::update([
                'in_active'=>1,
            ]);
        }else{
            Student::update([
                'in_active'=>0,
            ]);
        }
        // Student::query()->find($request->id)->update(['in_active' => $request->in_active]);

        // return response()->json(['message' => 'Status updated successfully']);
    }
}
// public function user_status_change($id){
//     $user_status = User::find($id);
//     if($user_status->status==1){
//         DB::table('users')->where('id',$user_status->id)->update(['status'=>0]);
//     }else{
//         DB::table('users')->where('id',$user_status->id)->update(['status'=>1]);
//     }
//     return redirect('admin/all-user');
// }
