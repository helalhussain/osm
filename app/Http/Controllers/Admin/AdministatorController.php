<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Notifications\AdministratorNotification;
use Illuminate\Support\Facades\Notification;


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
            'password' =>'required|min:8|max:30',
            'password_confirmation' => 'same:password'
        ]);

        $store = new Administator();
        $store->name = $request->name;
        $store->email = $request->email;
        $store->employee_id = $request->employee_id;
        $store->designation = $request->designation;
        $store->joining = $request->joining;
        $store->dob = $request->birthdate;
        $store->gender = $request->gender;
        $store->phone = $request->phone;
        $store->address = $request->address;
        $store->password = bcrypt($request->password);
        $store->image = $request->image;
        $store->save();
        $store->notify(new AdministratorNotification($store->name,$store->email,$request->password));
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
        if($request->image==null){
            $administator->update([
                'name'=>$request->name,
                'email'=>$request->email,
                   'employee_id' => $request->employee_id,
                   'designation' => $request->designation,
                   'joining' => $request->joining,
                   'dob' => $request->birthdate,
                   'gender' => $request->gender,
                   'phone' => $request->phone,
                   'address' => $request->address,

            ]);
        }
        else{
            $administator->update([
                'name'=>$request->name,
                'email'=>$request->email,
                   'employee_id' => $request->employee_id,
                   'designation' => $request->designation,
                   'joining' => $request->joining,
                   'dob' => $request->birthdate,
                   'gender' => $request->gender,
                   'phone' => $request->phone,
                   'address' => $request->address,
                   'image' => file_upload($request->image, 'administator'),
            ]);
        }

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
