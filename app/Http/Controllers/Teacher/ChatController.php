<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;


class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chats = User::all();
        return view('teacher.chat.index',compact('chats'));
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
        $store->user_id = $request->user_id;
        $store->teacher_id = auth()->user()->id;
        $store->message = $request->message;
        $store->chat_type = 'teacher';
        $store->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $users = User::all();
        $chat = User::find($id);
        $messages = Chat::where('teacher_id','=',auth()->user()->id)
        ->where('user_id','=',$chat->id)->get();
        return view('teacher.chat.show',compact('users','chat','messages'));
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
