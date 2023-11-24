<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cls;

class UserController extends Controller
{

    public function create(){
        $classes = Cls::all();
        return view('registration',compact('classes'));
    }

    public function singup(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'student_id' => 'required',
            'cls_id' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|same:password',
        ]);

        $user = new User();
        $user->student_id=$request->student_id;
        $user->name=$request->name;
        $user->cls_id=$request->cls_id;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        // $user = User::create([
        //     'name' => $request->name,
        //     'student_id' => $request->student_id,
        //     'class' => $request->class,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        return redirect()->route('login');
    }
}
