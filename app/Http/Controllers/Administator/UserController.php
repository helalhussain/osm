<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Section;
use App\Models\Classroom;
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
        return view('administator.student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'id' => 'required',
        //     'name' => 'required',
        //     'email'=>'required',
        //     'password'=>'required|min:8',
        //     'password_confirmation'=>'required|same:password'

        // ]);

        // $store = new User();
        // $store->student_id = $request->id;
        // $store->name = $request->name;
        // $store->cls_id = $request->class;
        // $store->email = $request->email;
        // $store->phone = $request->phone;
        // $store->gender = $request->gender;
        // $store->dob= $request->date;
        // $store->address = $request->address;
        // $store->password = bcrypt($request->password);
        // $store->image = file_upload($request->image, 'student');
        // $store->save();
        // return response()->json([
        //     'message' => 'Student added successfully'
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $classes = Classroom::all();
        $sections = Section::all();
        $payments = Payment::orderBy('id', 'DESC')->get();
        return view('administator.student.show',compact('user','payments','classes','sections'));
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
                'classroom_id'=>$request->class,
                'section_id'=>$request->section,
                'in_active'=>$request->active,
        ]);
        }else{
            $user->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'gender'=>$request->gender,
                'dob'=>$request->date,
                'address'=>$request->address,
                'classroom_id'=>$request->class,
                'section_id'=>$request->section,
                'in_active'=>$request->active,
                'image' => file_upload($request->image, 'user'),
        ]);

        }



        return response()->json(['message' => 'Student updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
