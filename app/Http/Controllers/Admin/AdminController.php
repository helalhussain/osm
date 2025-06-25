<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          if (request()->ajax()) {
            return DataTables::eloquent(Admin::query())
                ->addIndexColumn()
                ->addColumn('action', fn () => '')
                ->toJson();
        }
        return view('admin.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Admin $admin)
    {
        return view('admin.admin.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins',
            'password' =>'required|min:8|max:30',
            'password_confirmation' => 'same:password'
        ]);

        $store = new Admin();
        $store->name = $request->name;
        $store->email = $request->email;
        $store->password = bcrypt($request->password);
        $store->save();

        $store->notify(new AdminNotification($store->name,$store->email,$request->password));
        return response()->json([
            'message' => 'Admin added successfully'
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
    public function edit(Admin $admin)
    {
        return view('admin.admin.form',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required',
            'email' =>'required|email',

        ]);
        $admin->update([
                'name'=>$request->name,
                'email'=>$request->email,
        ]);
        return response()->json(['message' => 'Admin updated successfully']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return response()->json([
            'message' => 'Admin deleted successful'
        ]);
    }
}
