<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Course;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(){
    //
    //     return view('student.profile.show',compact('courses'));
    // }

     public function show()
     {
        $courses = Course::all();
        //  return view('student.profile.show',compact('courses'));
        return response()->json(['courses'=>$courses]);
     }


 /**
  * Show the form for editing the specified resource.
  */
    public function edit()
    {

        return view('student.profile.edit');
    }

 /**
  * Update the specified resource in storage.
  */
    public function password()
    {
        return view('student.profile.password');
    }
 public function update(Request $request)
 {


     $request->validate([
         'name'  => ['required','string','max:20'],
         // 'email' => ['required','email','string','unique:admins,email,'.auth()->id()],
         'image' => ['nullable','image',image_allowed_extensions(),'max:512']
     ]);

     $user = User::find(auth()->id());

     $user->update([
         'name'  => $request->name,
         'image'  => $request->hasFile('image') ? file_upload($request->image, 'user', $user->image) : $user->image
     ]);

     return response()->json([
         'message' => 'Student updated successfully'
     ]);
}
}
