<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Course;
use App\Models\Content;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function dashboard(){
        // $courses = Course::where('classroom_id','=',auth()->user()->classroom_id)
        // ->where('section_id','=',auth()->user()->section_id)->get();
        $courses = Course::all();
        $notices = Notice::all();
        return view('student.dashboard',compact('courses','notices'));
    }

    public function content_show($id)
    {
       $contents = Content::where('course_id','=',$id)->get();
        $course = Course::find($id);
       return view('student.content.show',compact('contents','course'));
    }

    public function notice_show($id){
        $notice = Notice::find($id);
        return view('student.notice.show',compact('notice'));
    }

    public function file_download(Request $request,$file)
    {
        return response()->download(public_path('assets/',$file));
    }
}
