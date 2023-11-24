<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Course;

class DashboardController extends Controller
{
    public function dashboard(){
        $courses = Course::all();
        $notices = Notice::all();
        return view('student.dashboard',compact('courses','notices'));
    }



    public function notice_show($id){
        $notice = Notice::find($id);
        return view('student.notice.show',compact('notice'));
    }
}
