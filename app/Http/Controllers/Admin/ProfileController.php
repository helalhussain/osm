<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.profile.password');
    }

    public function show()
        {
            return view('admin.profile.show');
        }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

        return view('admin.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {


        $request->validate([
            'name'  => ['required','string','max:20'],
            // 'email' => ['required','email','string','unique:admins,email,'.auth()->id()],
            'image' => ['nullable','image',image_allowed_extensions(),'max:512']
        ]);

        $admin = Admin::find(auth()->id());

        $admin->update([
            'name'  => $request->name,
            'image'  => $request->hasFile('image') ? file_upload($request->image, 'admin', $admin->image) : $admin->image
        ]);

        return response()->json([
            'message' => 'Admin updated successfully'
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
