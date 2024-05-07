<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\Teacher;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $chats = User::all();
        // return view('teacher.chat.index',compact('chats'));
        $chats = Teacher::all();
        // $chats = Chat::all();
        $teachers = Teacher::all();
        return  view('student.chat.index',compact('chats','teachers'));
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
         // dd($request->all());
         $store = new Chat();
         $store->user_id = auth()->user()->id;
         $store->teacher_id = $request->teacher_id;
         $store->message = $request->message;
         $store->chat_type = 'student';
         $store->save();
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    // public function show(Chat $chat,$id)
    // {
    //     $users = User::all();
        // $chat = User::find($id);
        // $messages = Chat::all();
        // return view('teacher.chat.show',compact('users','chat','messages'));

        // $teachers = Teacher::find($id);
        // $teachers = Teacher::all();
    //     return  view('student.chat.index',compact('users','teachers'));
    //     return view('student.chat.show');
    // }
    public function show($id)
    {
        $teachers = Teacher::all();
        $chat = Teacher::find($id);
        $messages = Chat::where('user_id','=',auth()->user()->id)
        ->where('teacher_id','=',$chat->id)->get();
        return view('student.chat.show',compact('teachers','chat','messages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
