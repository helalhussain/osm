<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Models\Course;

class HomeController extends Controller
{
    public function home()
    {
        $courses = Course::all();
        return view('welcome',compact('courses'));

    }

    public function course_details($id){
        $course_detail = Course::find($id);
        return view('course_detail',compact('course_detail'));
    }

   public function update(Request $request)
   {
    $request->validate([


    ]);

    $teacher = User::find(auth()->id());

    $teacher->update([
        'course_id'  => $request->course_id,
        'resource_no'=>$request->resource_no,

    ]);

    return redirect()->route('profile.show')->with('success','Course Purchase Successfully');

   }

}
