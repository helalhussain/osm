<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Administator;
use App\Models\Teacher;

class DashboardController extends Controller
{
    public function index(){
        $student = User::all();
        $teacher = Teacher::all();
        $administator = Administator::all();
        return view('administator.dashboard',compact('student','teacher','administator'));

    }
}
