<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show()
    {
        return view('teacher.profile.show');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('teacher.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'name'  => ['required','string','max:20'],
            // 'email' => ['required','email','string','unique:teachers,email,'.auth()->id()],
            'image' => ['nullable','image',image_allowed_extensions(),'max:512']
        ]);

        $teacher = Teacher::find(auth()->id());

        $teacher->update([
            'name'  => $request->name,
            'dob'=>$request->date,
            'phone'  => $request->phone,
            'gender'  => $request->gender,
            'address'  => $request->address,
            'image'  => $request->hasFile('image') ? file_upload($request->image, 'teacher', $teacher->image) : $teacher->image
        ]);

        return response()->json([
            'message' => 'Teacher updated successfully'
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
